<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::get();
        return view('admin/product_display',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::get();
        return view('admin/product_add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->file('pimage');

        if($file!=""){
            $filepath=$file->getClientOriginalName();
            $file->move(public_path('images'),$filepath);

            $product=new Product();
            $product->catg_id=$request->get('catg_id');
            $product->pname=$request->get('pname');
            $product->desc=$request->get('desc');
            $product->price=$request->get('price');
            $product->pimage = $filepath;

           
            $product->save();

               echo "<script>
                alert('Data inserted');
                window.location.href = '/product';
            </script>";
        } else {
            return "Please select a file.";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function show($id)
    {
        // Fetch product with related stock info
        $product = Product::with('stock')->findOrFail($id);   
        return view('shop', compact('product')); 
    }

    public function showDetail($id)   //this is for check stock in shop-detail page
    {
        $product = Product::with('stock')->findOrFail($id);   
        return view('shop-detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::get(); // or Category::get()

        return view('admin.product_update', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->catg_id=$request->get('catg_id');
        $product->pname=$request->get('pname');
        $product->desc= $request->get('desc');
        $product->price=$request->get('price');

        if ($request->hasFile('pimage')) {
        $file = $request->file('pimage');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $product->pimage = $filename;
        }
        $product->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        
        return redirect('/product');
    }

    //product fetch in shop page
    public function shoppage(){
        $product = Product::paginate(9);
        $category=Category::get();
        return view('shop',compact('product','category'));
    }

    public function productDetails($id)
    {
        // Convert dashes back to spaces
        $productName = str_replace('-', ' ', $id);

        // Find product by name 
        $products = Product::where('pname', $productName)->get();  //get()  we get multiple products

        $product = null;

        foreach ($products as $p) {
            $product = $p;
            break;      // Take only the first one product
        }

        if (!$product) {
            abort(404);
        }

        // Load categories if needed
        $category = Category::all();

        return view('shop-detail', compact('product', 'category'));
    }


    //search button 
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('pname', 'like', "%{$query}%")->get();

        return view('search-results', compact('products', 'query'));
    }

    public function generateQrCode($id)
    {
        $product =Product::find($id); 

        $url = "http://192.168.1.36:8000/product/$id"; // update this line

        return view('qrcode', compact('product', 'url'));
    }
}
