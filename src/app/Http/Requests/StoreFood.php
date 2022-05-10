<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFood extends FormRequest
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
            'food_name' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'expiry' => 'required|after:today',
            'storage' => 'required',
            'memo' => 'nullable'
        ];
    }
}
