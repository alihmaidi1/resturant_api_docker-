<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class UpdateadminValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:admins,id"],
            "email"=>["required"],
            "role_id"=>["required","exists:roles,id","not_in:1"],
            "resturant_id"=>["required","exists:resturants,id"],
            "rank"=>["required"]
        ];
    }


    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data"),
            "email.required"=>trans("admin.email is required"),
            "role_id.required"=>trans("admin.role id is required"),
            "role_id.exists"=>trans("admin.role id is not exists in our data"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "rank.required"=>trans("admin.rank is required"),
            "role_id.not_in"=>trans("admin.this role for super admin")


        ];
    }
}
