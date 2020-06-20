<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'order_number' => 'required',
            'user_id' => 'required,'.Auth::user()->id,
            'status' => 'required'.'pending',
            'grand_total' => 'required'.\Cart::getSubTotal(),
            'item_count' => 'required'.\Cart::getContent()->count(),
            'payment_status' => 'required'.'1',
            'payment_method' => 'required'.'paypal',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'post_code' => 'required',
            'phone_number' => 'required',
            'notes' => 'required',
        ];
    }
}
