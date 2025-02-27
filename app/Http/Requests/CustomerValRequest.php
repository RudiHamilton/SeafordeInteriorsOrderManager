<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CustomerValRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        Log::info('Reached validation');
        return [
            'customer_first_name' =>'required',
            'customer_second_name'=> 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'hidden_firstline_address' => 'required',
            'hidden_postcode' => 'required',
        ];
    }
    public function messages(){
        return [
            'customer_first_name.required'=> 'Please enter a first name',
            'customer_second_name.required'=> 'Please enter a second name',
            'customer_email.required'=> 'Please enter a valid email.'

        ] ;
    }
}
