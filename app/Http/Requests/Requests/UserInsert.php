<?php

namespace App\Http\Requests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInsert extends FormRequest
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
            "uname"=>"required|regex:/\w{4,8}/|unique:user",
            "password"=>"required|regex:/\w{6,18}/|",
             "email"=>'required|email|unique:user',
        ];
    }
    public function messages(){
          return[
           "uname.required"=>"名字不能为空",
           'uname.regex'=>"名字必须4-8位数",
           "uname.unique"=>"名字能重复",
           "password.required"=>"密码不能为空",
           "password.regex"=>'密码不能少于6位',
           "email.required"=>"邮箱不能为空",
           "email.email"=>"必须是邮箱格式",
           "eamil.unique"=>"邮箱已经在使用",
         ];
    }
}
