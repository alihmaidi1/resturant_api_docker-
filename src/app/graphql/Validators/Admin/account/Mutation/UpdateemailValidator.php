<?php

namespace App\GraphQL\Validators\Admin\account\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class UpdateemailValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "email"=>["required"]

        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email is required")

        ];
    }

}
