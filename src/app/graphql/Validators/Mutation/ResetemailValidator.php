<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class ResetemailValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "email"=>["email","required","exists:admins,email"],
        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email field is required"),
            "email.email"=>trans("admin.email field should be email"),
            "email.exists"=>trans("admin.your data not exists in our system"),

        ];
    }
}
