<?php

namespace App\GraphQL\Validators\Admin\account\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class CreateadminValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [


            "email"=>["required","email","unique:admins,email"],
            "password"=>["required"],
            "role_id"=>["exists:roles,id","required"],
            "resturant_id"=>["required","exists:resturants,id"],
            "rank"=>["required"]


        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email field is required"),
            "email.email"=>trans("admin.email field should be email"),
            "email.unique"=>trans("admin.The Email is found in our data"),
            "password.required"=>trans("admin.password field is required"),
            "role_id.exists"=>trans("admin.the role is not found in our data"),
            "role_id.required"=>trans("admin.the role is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "rank.required"=>trans("admin.rank is required")

        ];
    }



}
