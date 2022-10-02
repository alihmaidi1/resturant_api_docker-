<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class LoginuserValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "email"=>["required","exists:users,email"],
            "password"=>["required"]

        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email is required"),
            "email.exists"=>trans("admin.email is not exists in our data"),
            "password.required"=>trans("admin.password is required")


        ];
    }
}
