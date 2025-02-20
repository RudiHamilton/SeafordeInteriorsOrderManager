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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
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
}
