<?php

namespace App\GraphQL\Validators\Admin\role\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class DeleteroleValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","not_in:1","exists:roles,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id field is required"),
            "id.not_in"=>trans("admin.can't delete super role"),
            "id.exists"=>trans("admin.id not found in our data")

        ];
    }

}
