<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authRequest extends FormRequest
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
            'FIO' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Это поле обязательно для заполнения',
        ];
    }
}
