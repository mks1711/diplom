<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class specificationRequest extends FormRequest
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
            'order_id' => 'required',
            'material'=>'required',
            'furniture'=>'required',
            'sound_insulation' => 'required',
            'thermal_insulation' => 'required',
        ];
    }
}
