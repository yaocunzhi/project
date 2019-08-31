<?php

namespace App\Http\Requests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminuserInsert extends FormRequest
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
          "name"=>"required|regex:/\w{4,8}/|unique:admin_users",
          "password"=>"required|regex:/\w{6,18}/",
          "repassword"=>"required|same:password",
        ];
    }
    public function messages()
    {
       return [
          "name.required"=>"名字不能为空",
          'name.regex'=>"名字必须4-8位数",
          "name.unique"=>"名字能重复",
          "password.required"=>"密码不能为空",
          "repassword.required"=>"确认密码不能为空",
          "repassword.same"=>"密码不一致",
          "password.regex"=>'密码不能少于6位大于18位',
          ];

    }
}
