<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if (!$user) {
            return redirect('/register')
                ->withInput(['email' => $request->email])
                ->with('info', 'No account found. Please register.');
        }

        if ($request->password === $user->password) {

            session([
                'user_id'   => $user->id,
                'user_name' => $user->name,
                'user_email'=> $user->email,
            ]);

            return redirect('/')->with('success', 'Logged in successfully');
        } else {
            return back()->with('error', 'Invalid password');
        }
    }

  
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        DB::table('users')->insert([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password   // plain password stored
        ]);

        return redirect('/login')->with('success', 'Registered successfully. Please Log In.');
    }

    public function logout()
    {
        session()->forget(['user_id', 'user_name']);
        return redirect('/login')->with('success', 'Logged out successfully');
    }

  
    public function showprofile()
    {
        if (!session('user_id')) {
            return redirect('/login')->with('error', 'Please login to view profile');
        }

        $user = DB::table('users')->find(session('user_id'));

        return view('edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $userId = session('user_id');
        $user = User::find($userId);

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'nullable|min:6',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        // Save plain text password 
        if (!empty($request->password)) {
            $user->password = $request->password;
        }

        $user->save();

        return back()->with('success', 'Profile updated');
    }

  
    public function myOrders($name)
    {
        $orders = DB::table('orders')
            ->where('first_name', $name)
            ->orderBy('created_at', 'desc')
            ->get();

        $orderItems = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.first_name', $name)
            ->select(
                'order_items.order_id',
                'products.pname as product_name',
                'products.pimage as product_image',
                'order_items.quantity',
                'order_items.price'
            )
            ->get();

        return view('my_orders', compact('orders', 'orderItems', 'name'));
    }
}