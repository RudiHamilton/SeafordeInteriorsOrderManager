<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('/usedpages/vieworders',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order_id)
    {
        Log::info('Destroy method reached');
        Order::where('order_id',$order_id)->delete();
        Log::info('order_id grabbed and deleted');
        $orders = Order::all();
        Log::info('order records loaded again');
        return view('/usedpages/vieworders',compact('orders'));
    }
    
    public function productCostCalc($order_id,$product_id,$order_product_id){
        //searches search for ids
        $orderProduct= OrderProduct::find($order_product_id);
        $order = Order::find($order_id);
        $product = Product::find($product_id);

        //gets the parameters needed for calculations
        $costToMake = $product->cost_to_make;
        $price = $product->product_price;
        $quantity = $orderProduct->order_product_quantity;
        
        //calculations
        $netprofit = $quantity * $price;
        $totalCost = $costToMake * $quantity;
        $totalPrice = $price * $quantity;

        //storing data 
        $order->order_net_proft = $netprofit;
        $order->order_profit = $totalPrice;
        $order->order_cost_to_make = $totalCost;
    }
}
