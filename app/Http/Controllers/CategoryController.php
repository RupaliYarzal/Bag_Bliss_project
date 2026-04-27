<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catg=Category::get();
        //return view('admin/category_add',compact('catg'));
        return view('admin/category_display',compact('catg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cname = $request->get('cname'); // ✅ Define $cname
        $file = $request->file('cimage');

        if ($file != "") {
            $filepath = $file->getClientOriginalName();
            $file->move(public_path('images'), $filepath);

            $fileup = new Category([
                'cname' => $cname,
                'cimage' => $filepath
            ]);
            $fileup->save();

            echo "<script>
                alert('Data inserted');
                window.location.href = '/category';
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catg=Category::find($id);
        return view('admin/category_update',compact('catg'));
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
        $cname = $request->get('cname'); // Update name

        $catg=Category::find($id);
        $catg->cname=$cname;
        
        if ($request->hasFile('cimage')) {
            $file = $request->file('cimage');
            $filepath = $file->getClientOriginalName();
            $file->move(public_path('images'), $filepath);
            $catg->cimage = $filepath; // Update image only if new one uploaded
        }

        $catg->save();

        echo "<script>
            alert('Data updated');
            window.location.href = '/category';
        </script>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catg=Category::find($id);
        $catg->delete();
        return redirect('/category');
    }

    // it is to send catg to index page
    public function frontend(){
        $category=Category::get();
        return view('index',compact('category'));
    }

    //pass the catg_id, to display products as per catg
   
    public function catgdetails($cid)
    {
        // Convert dash to space
        $catgName = str_replace('-', ' ', $cid);

        // Find category by cname (not ID)
        $data = Category::where('cname', $catgName)->first();

        if ($data) {
            $pro = Product::where('catg_id', $data->id)->get(); // catg_id in product table
            $catg = Category::all(); // list of all categories
            return view('catg_product', compact('pro', 'catg'));
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }

}
