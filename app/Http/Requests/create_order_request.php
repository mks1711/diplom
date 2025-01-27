<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class create_order_request extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_number'=>'required',
            'order_date'=>'required',
            'order_status'=>'required',
            'order_customer'=>'required',
            'order_address'=>'required',
            'order_name'=>'required',
            'order_description'=>'required',
            'order_size'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Это поле обязательно для заполнения',
        ];
    }
}
