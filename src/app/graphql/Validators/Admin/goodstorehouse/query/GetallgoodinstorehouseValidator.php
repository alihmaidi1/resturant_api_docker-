<?php

namespace App\GraphQL\Validators\Admin\goodstorehouse\query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetallgoodinstorehouseValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "storehouse_id"=>["required","exists:storehouses,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "storehouse_id.required"=>trans("admin.storehouse id is required"),
            "storehouse_id.exists"=>trans("admin.storehouse id is not exists in our data")

        ];
    }


}
