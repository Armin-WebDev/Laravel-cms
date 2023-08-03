<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'roles'=>'required',
            'status'=>'required',
            'password'=>'required|min:6 ',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لطفا نام و نام خانوادگی خود را وارد کنید',
            'email.required' => 'لطفا ایمیل خود را وارد کنید',
            'roles.required' => 'لطفا نقش خود را وارد کنید',
            'status.required' => 'لطفا وضعیت خود را وارد کنید',
            'password.required' => 'لطفا رمز عبور خود را وارد کنید',

        ];
    }
}
