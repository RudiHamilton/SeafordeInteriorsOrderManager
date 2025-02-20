<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('/usedpages/viewcustomers',compact('customers'));
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
        Log::info('Customer Store function reached');
        $data = new Customer();
        $data->customer_first_name = $request->customer_first_name;
        $data->customer_second_name = $request->customer_second_name;
        $data->customer_email = $request->customer_email;
        $data->customer_phone = $request->customer_phone;
        $data->customer_firstline_address = $request->customer_firstline_address;
        $data->customer_secondline_address = $request->customer_secondline_address;
        $data->customer_postcode = $request->customer_postcode;
        $data->save();
        Log::info('Customer data has been stored in databse');
        return view('/usedpages/addcustomer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customer_id)
    {
        Log::info('Destroy method reached');
        Customer::where('customer_id',$customer_id)->delete();
        Log::info('customer_id grabbed and deleted');
        $customers = Customer::all();
        Log::info('customer records loaded again');
        return view('/usedpages/viewcustomers',compact('customers'));
    }
}
