<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:191',
            'password'=>'required',
            'email' => 'required|email|unique:users',
            'address'=>'required',
            'phone'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute Không được để trống',
            'max'=>':attribute Không được quá :max ký tự',
            'email.email' => ':attribute sai định dạng',
            'email.unique' => ':attribute đã tồn tại',
            'image' => ':attribute phải là hình ảnh',
            'mimes' => ':attribute phải định dạng như sau:jpeg,png,jpg,gif',
            'image.max' => ':attribute Maximum file size to upload :max'
        ];
    }
}
