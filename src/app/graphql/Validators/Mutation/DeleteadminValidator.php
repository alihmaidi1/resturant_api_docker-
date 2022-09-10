<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class DeleteadminValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","not_in:1"]

        ];
    }

    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id field is required"),
            "id.not_in"=>trans("admin.you can't delete root admin")
        ];
    }
}
