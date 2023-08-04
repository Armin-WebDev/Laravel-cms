<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostEditRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if ($this->input('slug')){
            $this->merge(['slug'=>make_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug'=>make_slug($this->input('title'))]);

        }
    }
    public function rules()
    {
        return [
            'title'=>'required|min:10',
            'slug'=> Rule::unique('posts')->ignore(request()->post),
            'description'=>'required',
            'categories'=>'required',
            'status'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان مقاله را وارد کنید',
            'title.min' => ' عنوان مقاله باید بیش از 10 کارکتر باشد',
            'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
            'description.required' => 'لطفا توضیحات مقاله را وارد کنید',
            'photo.required'=>'لطفا عکس مقاله را بارگذاری کنید',
            'categories.required' => 'لطفا دسته بندی مقاله را انتخاب کنید',
            'status.required' => 'لطفا وضعیت مقاله را انتخاب کنید',
        ];
    }
}
