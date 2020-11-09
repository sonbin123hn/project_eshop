<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequet extends FormRequest
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
            'name' => ['', 'string', 'max:255'],
            'email' => ['required'],
            'password' => 'min:8|required_with:repassrg|same:repassrg',
            'repassrg' => 'min:8',
            'phone'=>'min:10|numeric',
            'address' =>'',
        ];
    }
}
