<?php

namespace App\Http\Requests\api\admin\account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class resetPasswordEmail extends FormRequest
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

            "email"=>"required|email|exists:admins,email"

        ];
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){


        throw new HttpResponseException(

            response()->json(["message"=>$validator->errors()->first()],401)

        );

    }

}
