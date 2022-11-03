<?php

namespace App\GraphQL\Validators\Admin\currency\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class DeletecurrencyValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:currencies,id"]

        ];
    }


    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.the id is not exists")

        ];
    }



}
