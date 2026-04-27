<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function index()
    {
        $totalCategories = \App\Models\Category::count();
        $totalProducts = \App\Models\Product::count();
        $totalStock = \App\Models\Stock::sum('qty'); // assuming you have 'qty' column for stock quantity

        return view('admin.index', compact('totalCategories', 'totalProducts', 'totalStock'));
    }


}
