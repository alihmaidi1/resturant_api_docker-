<?php

namespace App\GraphQL\Validators\Admin\account\mutation;

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
            "password"=>["required"]

        ];
    }


    public function messages(): array
    {

        return [

            "password"=>trans("admin.password field is required")

        ];

    }
}
