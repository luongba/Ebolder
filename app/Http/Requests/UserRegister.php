<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegister extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'phone'=>'required|string|unique:users',
            'password' => 'required|string|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường :attribute là bắt buộc',
            'unique' => 'Trường :attribute là duy nhất',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'phone' => 'Số điện thoại'
        ];
    }
}
