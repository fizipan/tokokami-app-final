<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentRequest extends FormRequest
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
            'address' => 'required|string',
            'provinces_id' => 'required|exists:provinces,id',
            'regencies_id' => 'required|exists:regencies,id',
            'postal_code' => 'required',
            'couriers_id' => 'required|exists:couriers,code',
            'payments_id' => 'required|exists:payments,id',
            'phone_number' => 'required|string',
        ];
    }
}
