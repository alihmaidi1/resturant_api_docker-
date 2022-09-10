<?php

namespace App\Http\Requests\api\admin\account;

use Illuminate\Foundation\Http\FormRequest;

class create extends FormRequest
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

            "email"=>"required|unique:admins,email",
            "name"=>"required|unique:admins,name",
            "password"=>"required",
            "role_id"=>"required|exists:roles,id",
            "resturant_id"=>"nullable|exists:resturants,id"

        ];
    }
}
