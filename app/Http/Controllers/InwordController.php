<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Inword;

class InwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $inwords = Inword::with('product')->get(); 
        return view('admin/inword_display', compact('inwords'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $products = Product::all();
        return view('admin/inword_add', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'pid'=>'required|exists:products,id',
            'qty'=>'required|integer|min:1',
            'price'=>'required|numeric|min:0',
        ]);
        
        $inword=new Inword();
        $inword->pid=$request->get('pid');
        $inword->qty=$request->get('qty');
        $inword->price=$request->get('price');
        
        $inword->save();

        // Call insertStock
        $this->insertStock($request);

        echo "<script>
            alert('Values inserted');
            window.location.href='inword/create';
        </script>";

    }

    public function insertStock(Request $request){
        // $stock is a collection, so you can’t do $stock->qty or $stock->save() directly.
        $request->validate([
            'pid' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);
        
        $stockItems=Stock::where('pid',$request->pid)->get();
        // get() returns a collection of records 
        if ($stockItems->isNotEmpty()) {

            foreach ($stockItems as $stock) {
            $stock->qty += $request->qty;
            $stock->save();
        }
    }
        else{
            //stock doesn't exist, insert new
            $stock=new Stock();

            $stock->pid=$request->get('pid');
            $stock->qty=$request->get('qty');

            if ($stock->save()) {
                echo "<script>
                    alert('Values inserted');
                    window.location.href='inword/create';
                </script>";
            } 
            else {
                echo "Stock not inserted.";
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
