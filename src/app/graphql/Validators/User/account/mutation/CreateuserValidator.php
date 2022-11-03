<?php

namespace App\GraphQL\Validators\User\account\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class CreateuserValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "name"=>["required"],
            "email"=>["required","email","unique:users,email"],
            "password"=>["required"]

        ];
    }



    public function messages(): array
    {

        return [

            "name.required"=>trans("admin.name is required"),
            "email.required"=>trans("admin.email is required"),
            "email.email"=>trans("admin.email field should be email"),
            "email.unique"=>trans("admin.the email is exists in our data"),
            "password.required"=>trans("admin.password is required")

        ];


    }

}
