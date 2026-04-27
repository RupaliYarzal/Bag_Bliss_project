<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;   //for user details and user orders
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User;
use App\Http\Controllers\InwordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// ---------------------------------Back End-----------------------------------------
// Dashboard related routes
Route::get('home', [DashboardController::class, 'index']);
Route::resource('category',CategoryController::class);
Route::resource('product',ProductController::class);
Route::resource('/inword',InwordController::class);
// Admin view all users
Route::get('users', [AdminController::class, 'allUsers']);
// Admin view orders of a user
// ->where('email', '.*') allows the route to match full email strings including dots and @.
Route::get('user-orders/{email}', [AdminController::class, 'userOrders'])
     ->where('email', '.*');

Route::get('/orders_pdf/{email}', [AdminController::class, 'downloadOrdersPdf'])->name('orders.pdf'); //this for-to download pdf in browser in backend

// --------------------------------------Front ENd----------------------------------------------------------

Route::get('/', [CategoryController::class, 'frontend']);  //funtion name-frontend
Route::get('/search', [ProductController::class, 'search']);    //search button
Route::get('/shop', [ProductController::class, 'shoppage'])->name('shop');   //funtion name-shoppage(catg_contr)
Route::get('/shop-detail/{id}',[ProductController::class,'productdetails']);// id is the pname
Route::get('/catg_product/{cid}',[CategoryController::class,'catgdetails']);  //id is cname

Route::middleware(['checkLogin'])->group(function () {
    Route::post('/cart/{pname}', [CartController::class, 'add']);
    Route::get('/cart', [CartController::class, 'viewCart']); 
    Route::post('/cart/update/{pname}', [CartController::class, 'updateQuantity']);
    Route::post('/cart/remove/{pname}', [CartController::class, 'removeItem']);

    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/checkout', [CheckoutController::class, 'store']);
});

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);

//for user login 
Route::get('/login', [LoginController::class, 'showLogin']);
Route::get('/my-orders/{name}', [LoginController::class, 'myOrders']);   //my-orders in profile button
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [LoginController::class, 'showRegister']);
Route::post('/register', [LoginController::class, 'register']);

Route::get('/show-profile', [LoginController::class, 'showprofile']); //show profile of user
Route::post('/update-profile', [LoginController::class, 'updateProfile']);  //for updating profile

Route::get('/about', function () {  //about us page
    return view('about');
});
Route::get('/privacy', function () {  //privacy policy page
    return view('privacy');
});
Route::get('/terms',function(){   //terms & connditions page
    return view('terms');   //this will return page name
});

Route::get('/return', function () {  //return policy page
    return view('return_policy');
});

Route::get('/faq', function () {   //return FAQ page
    return view('faq');
});

Route::get('/product-qrcode/{id}', [ProductController::class, 'generateQrCode']);