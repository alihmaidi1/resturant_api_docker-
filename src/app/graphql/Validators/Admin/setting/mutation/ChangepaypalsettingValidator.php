<?php

namespace App\GraphQL\Validators\Admin\setting\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class ChangepaypalsettingValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "client_id"=>["required"],
            "secret"=>["required"]

        ];
    }


    public function messages(): array
    {
        return [

            "client_id.required"=>trans("admin.client id is required"),
            "secret.required"=>trans("admin.secret is required")


        ];
    }

}
