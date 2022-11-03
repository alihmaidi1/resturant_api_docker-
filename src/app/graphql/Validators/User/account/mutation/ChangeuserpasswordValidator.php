<?php

namespace App\GraphQL\Validators\User\account\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class ChangeuserpasswordValidator extends Validator
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
        return[

            "password.required"=>trans("admin.password is required")



        ];
    }

}
