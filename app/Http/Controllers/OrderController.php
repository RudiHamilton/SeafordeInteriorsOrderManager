<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
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
    public function create(Request $request)
    {
        $orders = Order::all();
        $products = Product::all();
        $customers = Customer::all();
        Log::info('Order Store function reached');
        return view('/usedpages/createorder',compact('orders','products','customers'));
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,)
    {   
        $product = Product::find($request->product_id);
        $calculatedValues = $this->productCostCalc($request->order_quantity, $product);
        $data = new Order();
        $data->product_id = $request->product_id;
        $data->customer_id = $request->customer_id;
        $data->order_quantity = $request->order_quantity;
        $data->order_payment_type = $request->order_payment_type;
        $data->order_complete = $request->order_complete;
        $data->order_profit = $calculatedValues['total_price'];
        $data->order_net_profit = $calculatedValues['net_profit'];
        $data->order_cost_to_make = $calculatedValues['total_cost'];
        $data->save();
        $orders = Order::all();
        $products = Product::all();
        $customers = Customer::all();
        Log::info('Order data has been stored in databse');
        return view('/usedpages/createorder',compact('orders','products','customers'));
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
    public function edit($order_id)
    {

        Log::info('Edit Method reached');
        $orders = Order::find($order_id);
        $products = Product::all();
        $customers = Customer::all();
        return view('/usedpages/editorder',compact('orders','products','customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $order =Order::find($id);
        $product = Product::find($request->product_id);
        $calculatedValues = $this->productCostCalc($request->order_quantity, $product);
        $order->update($request->all());
        $order->order_profit = $calculatedValues['total_price'];
        $order->order_net_profit = $calculatedValues['net_profit'];
        $order->order_cost_to_make = $calculatedValues['total_cost'];
        $order->save();
        $orders = Order::all();
        Log::info('Order data has been stored in databse');
        return view('/usedpages/vieworders',compact('orders'));

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

    public function productCostCalc($quantity,Product $product){
        
        //gets the parameters needed for calculations
        $costToMake = $product->product_cost_to_make;
        $price = $product->product_price;
        
        //calculations
        $netprofit = $quantity * $price;
        $totalCost = $costToMake * $quantity;
        $totalPrice = $netprofit - $totalCost;

        //storing data 
        return[
            'net_profit'=>$netprofit,
            'total_cost'=>$totalCost,
            'total_price'=>$totalPrice,
        ];
    }
}
