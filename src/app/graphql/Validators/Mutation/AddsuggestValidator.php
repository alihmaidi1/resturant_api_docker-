<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddsuggestValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "description"=>["required"]


        ];
    }


    public function messages(): array
    {


        return [

            "description.required"=>trans("admin.description is required")

        ];


    }
}
