<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class LoginValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "email"=>["email","required"],
            "password"=>["required"]

        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email field is required"),
            "email.email"=>trans("admin.email field should be email"),
            "password.required"=>trans("admin.password field is required")
        ];
    }




}
