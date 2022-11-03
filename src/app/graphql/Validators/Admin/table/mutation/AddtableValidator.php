<?php

namespace App\GraphQL\Validators\Admin\table\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddtableValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "name"=>["required"],
            "person_number"=>["required"],
            "description_en"=>["required"],
            "description_ar"=>["required"],
            "status"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"],
            "type_id"=>["required","exists:tabletypes,id"]

        ];
    }


    public function messages(): array
    {
        return [

            "name.required"=>trans("admin.name is required"),
            "person_number.required"=>trans("admin.person number is required"),
            "description_en.required"=>trans("admin.the description in english is required"),
            "description_ar.required"=>trans("admin.the description in arabic is required"),
            "status.required"=>trans("admin.status is required"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant is not exists in our data"),
            "type_id.required"=>trans("admin.table type is required"),
            "type_id.exists"=>trans("admin.table type is not exists in our data")
        ];
    }

}
