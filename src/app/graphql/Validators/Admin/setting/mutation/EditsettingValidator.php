<?php

namespace App\GraphQL\Validators\Admin\setting\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditsettingValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "currency_id"=>["exists:currencies,id"],

        ];
    }


    public function messages(): array
    {
        return [

            "currency_id.exists"=>trans("admin.currency id is not exists in our data")

        ];
    }
}
