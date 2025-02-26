<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('/usedpages/viewproducts',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Product Store function reached');
        $data = new Product();
        $data->product_name = $request->product_name;
        $data->product_price = $request->product_price;
        $data->product_cost_to_make = $request->product_cost_to_make;
        $data->product_current_stock = $request->product_current_stock;
        $data->save();
        Log::info('Product data has been stored in databse');
        return view('/usedpages/addproduct');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        Log::info('Edit Method reached');
        $product = Product::find($id);
        return view('/usedpages/editproduct',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Log::info('Reached the update method');
        $product = Product::find ($id);
        Log::info('product_id found');
        $product->update($request->all());
        Log::info('Records updated');
        return redirect('/usedpages/viewproducts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id)
    {
        Log::info('Destroy method reached');
        Product::where('product_id',$product_id)->delete();
        Log::info('product_id grabbed and deleted');
        $products = Product::all();
        Log::info('product records loaded again');
        return view('/usedpages/viewproducts',compact('products'));
    }

    public function search(Request $request){
        Log::info('Search method reached');
        $search_text = $request->get('search_products');
        Log::info('Search parameter found');
        $products = Product::where('product_id', 'like', '%' .$search_text. '%')
                            ->orWhere('product_name', 'like', '%' .$search_text. '%')
                            ->orWhere('product_price', 'like', '%' .$search_text. '%')
                            ->orWhere('product_cost_to_make', 'like', '%' .$search_text. '%')
                            ->orWhere('product_current_stock', 'like', '%' .$search_text. '%')->get();
        Log::info('Field found returning view');
        return view('/usedpages/viewproducts',compact('products'));
    }
}
