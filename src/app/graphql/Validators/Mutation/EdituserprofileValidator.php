<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EdituserprofileValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:users,id"],
            "name"=>["required"],
            "copon_notification"=>["required"]

        ];
    }


    public function messages(): array
    {

        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data"),
            "name.required"=>trans("admin.name is required"),
            "copon_notification.required"=>trans("admin.copon notification field is required")


        ];


    }
}
