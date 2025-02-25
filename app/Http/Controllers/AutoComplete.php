<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AutoComplete extends Controller
{
    public function autoComplete(Request $request)
    {
        $app_token = config('autocomplete.autocomplete_api_key');
        try {
            return view('/usedpages/addcustomer',compact('app_token'));
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
}
