<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\OrderItem;
use App\Models\Order;         // It is used for User and User orders
use Barryvdh\DomPDF\Facade\Pdf;   //to make pdf of orders 
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class AdminController extends Controller
{
    public function allUsers()
    {
        $users = Order::select('first_name', 'last_name', 'email')
               ->groupBy('email', 'first_name', 'last_name')
               ->get();


        return view('admin/users', compact('users'));
    }

    public function userOrders($email)
    {
        // Get all orders with items & product info
        $orders = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.email', $email)
            ->select(
                'orders.id as order_id',
                'orders.first_name',
                'orders.last_name',
                'orders.address',
                'orders.city',
                'orders.email',
                'orders.total as order_total',
                'orders.created_at',
                'products.pname as product_name',
                'order_items.quantity',
                'order_items.price'
            )
            ->orderBy('orders.id')
            ->get();

        return view('admin.user_orders', compact('orders'));
    }

    public function downloadOrdersPdf($email)
    {
        $user = DB::table('orders')
            ->where('email', $email)
            ->select('first_name', 'last_name', 'email', 'address', 'city')
            ->first();

        $orderDetails = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.email', $email)
            ->select('orders.id as order_id', 'products.pname as product_name', 'order_items.quantity', 'order_items.price', 'orders.created_at')
            ->get();

        $pdf = Pdf::loadView('admin/orders_pdf', compact('user', 'orderDetails'));
        return $pdf->download('orders.pdf');
    }
}
