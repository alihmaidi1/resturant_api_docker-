<?php

namespace App\GraphQL\Validators\Admin\goodstorehouse\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class DeletegoodstorehouseValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:store_goods,id"]


        ];
    }

    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")


        ];
    }


}
