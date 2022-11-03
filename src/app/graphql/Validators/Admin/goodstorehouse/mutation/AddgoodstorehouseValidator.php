<?php

namespace App\GraphQL\Validators\Admin\goodstorehouse\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddgoodstorehouseValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "quantity"=>["required"],
            "min_quantity"=>["required"],
            "good_id"=>["required","exists:goods,id"],
            "storehouse_id"=>["required","exists:storehouses,id"]


        ];
    }


    public function messages(): array
    {
        return [

            "quantity.required"=>trans("admin.quantity is required"),
            "min_quantity.required"=>trans("admin.the min quantity is required"),
            "good_id.required"=>trans("admin.good id is required"),
            "good_id.exists"=>trans("admin.the good is not exists in our data"),
            "storehouse_id.required"=>trans("admin.storehouse id is required"),
            "storehouse_id.exists"=>trans("admin.storehouse is not exists in our data")

        ];
    }


}
