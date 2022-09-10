<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class ChangepasswordValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:admins,id"],
            "password"=>["required"]

        ];
    }


    public function messages(): array
    {

        return [

            "id.required"=>trans("admin.id field is required"),
            "id.exists"=>trans("admin.your data not exists in our system"),
            "password"=>trans("admin.password field is required")

        ];

    }
}
