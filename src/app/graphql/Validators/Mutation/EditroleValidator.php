<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditroleValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "name_ar"=>["required"],
            "name_en"=>["required"],
            "permission"=>["array","required"],
            "id"=>["required","not_in:1","exists:roles,id"]

        ];
    }


    public function messages(): array
    {
        return [


            "name_ar.required"=>trans("admin.name in arabic is required"),
            "name_en.required"=>trans("admin.name in english is required"),
            "permission.array"=>trans("admin.permission should be array"),
            "id.required"=>trans("admin.id field is required"),
            "id.not_in"=>trans("admin.can't edit super role"),
            "id.exists"=>trans("admin.id not found in our data")




        ];
    }
}
