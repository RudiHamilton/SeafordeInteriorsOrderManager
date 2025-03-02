<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerValRequest;
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
    public function store(CustomerValRequest $request)
    {
        $request->validated();
        Log::info('Received form data:',  $request->all());
        Log::info('Customer Store function reached');
        Customer::create([
            'customer_first_name'=> $request->customer_first_name,
            'customer_second_name'=> $request->customer_second_name,
            'customer_email'=> $request->customer_email,
            'customer_phone'=> $request->customer_phone,
            'customer_firstline_address'=> $request->hidden_firstline_address,
            'customer_secondline_address'=> $request->hidden_secondline_address,
            'customer_postcode'=> $request->hidden_postcode,
        ]);
        Log::info('Customer data has been stored in databse');
        $customers = Customer::all();
        return view('/usedpages/viewcustomers',compact('customers'));
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
    public function edit($id)
    {
        Log::info('Edit Method reached');
        $customer = Customer::find($id);
        return view('/usedpages/editcustomer',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Log::info('Reached the update method');
        $customer = Customer::find ($id);
        Log::info('customer_id found');
        $customer->update($request->all());
        Log::info('Records updated');
        return redirect('/usedpages/viewcustomers');
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
    public function search(Request $request){
        Log::info('Search method reached');
        $search_text = $request->get('search_customers');
        Log::info('Search parameter found');
        $customers = Customer::where('customer_id', 'like', '%' .$search_text. '%')
                            ->orWhere('customer_second_name', 'like', '%' .$search_text. '%')
                            ->orWhere('customer_second_name', 'like', '%' .$search_text. '%')
                            ->orWhere('customer_email', 'like', '%' .$search_text. '%')
                            ->orWhere('customer_phone', 'like', '%' .$search_text. '%')
                            ->orWhere('customer_firstline_address', 'like', '%' .$search_text. '%')
                            ->orWhere('customer_secondline_address', 'like', '%' .$search_text. '%')
                            ->orWhere('customer_postcode', 'like', '%' .$search_text. '%')->get();
        Log::info('Field found returning view');
        return view('/usedpages/viewcustomers',compact('customers'));
    }
}
