<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreProductRequest extends Request
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
            'product_name' => 'required',
            'product_warehouse_quantity' => 'numeric|min:0'
        ];
    }
}
