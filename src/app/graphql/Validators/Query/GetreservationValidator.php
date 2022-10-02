<?php

namespace App\GraphQL\Validators\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetreservationValidator extends Validator
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
            "code"=>["required"]

        ];
    }


    public function messages(): array
    {
        return [

            "name.required"=>trans("admin.name is required"),
            "code.required"=>trans("admin.code is required")

        ];
    }
}
