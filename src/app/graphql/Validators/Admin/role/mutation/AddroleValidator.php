<?php

namespace App\GraphQL\Validators\Admin\role\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddroleValidator extends Validator
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

        ];

    }



    public function messages(): array
    {

        return [

            "name_ar.required"=>trans("admin.name in arabic is required"),
            "name_en.required"=>trans("admin.name in english is required"),
            "permission.array"=>trans("admin.permission should be array")
        ];
    }

}
