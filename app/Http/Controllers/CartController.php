<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;

class CartController extends Controller
{
   public function add(Request $request, $id)
    {
        // 🔐 Check if user is logged in
        if (!session()->has('user_id')) {
            return redirect('/login')->with('error', 'Please log in to add items to the cart.');
        }

        // Convert dashes back to spaces to get original product name
        $productName = str_replace('-', ' ', $id);

        // Find product by pname
        $product = Product::where('pname', $productName)->firstOrFail();

        $cart = session()->get('cart', []);

        // Use product ID as key
        if (isset($cart[$product->id])) {
            return redirect()->route('shop')->with('info', 'Product already in cart!');
        }

        $cart[$product->id] = [
            'product_id' => $product->id,
            'pname'      => $product->pname,
            'pimage'     => $product->pimage,
            'desc'       => $product->desc,
            'price'      => floatval($product->price),
            'quantity'   => 1,
            'total'      => floatval($product->price),
        ];

        session()->put('cart', $cart);

        return redirect()->route('shop')->with('success', 'Product added to cart!');
    }



//To view cart items in cart
   public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }


    public function updateQuantity(Request $request, $id)
    {
        // Convert dash back to original pname
        $productName = str_replace('-', ' ', $id);

        // Find the product by pname
        $product = Product::with('stock')->where('pname', $productName)->first();

        if (!$product) {
            return redirect('/cart')->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        // Cart is keyed by product ID, so we use $product->id
        if (!isset($cart[$product->id])) {
            return redirect('/cart')->with('error', 'This product is not in your cart.');
        }

        $newQty = max(1, (int) $request->quantity);

        $availableStock = $product->stock->qty ?? 0;
        //$qty = !empty($p->stock) ? $p->stock->qty : 0;
                //condition         //if true       //if false

        if ($newQty > $availableStock) {
            return redirect('/cart')->with('error', "Only $availableStock left in stock for {$product->pname}.");
        }

        $cart[$product->id]['quantity'] = $newQty;
        $cart[$product->id]['total'] = $newQty * $cart[$product->id]['price'];

        session()->put('cart', $cart);

        return redirect('/cart')->with('success', 'Your cart has been updated.');
    }

    public function removeItem($id)
    {
        // Convert dash back to original product name
        $productName = str_replace('-', ' ', $id);

        // Find the product by pname
        $product = Product::where('pname', $productName)->first();

        if (!$product) {
            return redirect('/cart')->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        // Use product ID as key to remove
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect('/cart')->with('info', 'Item removed from cart.');
    }
    
}

