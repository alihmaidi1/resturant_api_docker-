<?php

namespace App\GraphQL\Validators\Admin\account\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class CheckresetcodeValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "code"=>["required"]

        ];
    }

    public function messages(): array
    {
        return [

            "code.required"=>trans("admin.code is required"),


        ];
    }

}
