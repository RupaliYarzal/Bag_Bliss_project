<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Stock;


use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceMail;

class CheckoutController extends Controller
{
    // Show checkout form
    public function index()
    {
        return view('checkout'); // Blade file: checkout.blade.php
    }

    // Handle form submission
    public function store(Request $request)
    {
        $cart = $this->getCartData();

        if (empty($cart)) {
            return redirect('/checkout')->with('error', 'Your cart is empty.');
        }

        $data = $this->validateData($request);
        $total = $this->getTotal($cart);
        $order = $this->saveOrder($data, $total);
        $this->saveItems($cart, $order);

        // Fetch order items
        $orderDetails = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('order_items.order_id', $order->id)
            ->select('order_items.*', 'products.pname as product_name')
            ->get();

        // Prepare invoice data
        $user = $order;

        // Generate and store PDF
        $filePath = 'invoices/invoice_' . str_replace(['@', '.'], '_', $order->email) . '.pdf';
        $pdf = Pdf::loadView('emails/orders_pdf', compact('user', 'orderDetails'));
        Storage::put($filePath, $pdf->output());

        // Send email with PDF attachment
        Mail::to($user->email)->send(new InvoiceMail($pdf->output(), $user, $orderDetails));

        session()->forget('cart');

        return redirect('/checkout')->with('success', '🎉 Your Order placed successfully!');
    }

    function validateData($request)
    {
        return $request->validate([
            'first_name'   => 'required',
            'last_name'    => 'required',
            'company_name' => 'nullable',
            'address'      => 'required',
            'city'         => 'required',
            'country'      => 'required',
            'postcode'     => 'required',
            'mobile'       => 'required',
            'email'        => 'required|email',
            'notes'        => 'nullable',
        ]);
    }

    function getCartData()
    {
        return session('cart', []);
    }

    function getTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    function saveOrder($data, $total)
    {   //details of user
        $order = new Order();
        $order->user_id = session('user_id');
        $order->fill($data);   //validated data
        $order->total = $total;
        $order->save();
        return $order;
    }

    function saveItems($cart, $order)
    {
        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id; 
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
                        

            // get() returns a collection of records $stocks-multiple products, so for single item we use foreach
           $stocks = Stock::where('pid', $item['product_id'])->get();

            foreach ($stocks as $stock) {
                $stock->qty -= $item['quantity'];
                $stock->save();
            }

        }
    }
}
