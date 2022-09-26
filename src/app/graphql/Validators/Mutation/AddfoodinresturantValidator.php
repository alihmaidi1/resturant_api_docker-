<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddfoodinresturantValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "resturant_id"=>["required","exists:resturants,id"],
            "food_id"=>["required","exists:food,id"],
            "isVisiable"=>["required"],
            "price"=>["required"],
            "currency_id"=>["required","exists:currencies,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "food_id.required"=>trans("admin.food id is required"),
            "food_id.exists"=>trans("admin.food id is not exists in our data"),
            "isVisiable.required"=>trans("admin.isVisiable is required"),
            "price.required"=>trans("admin.price is required"),
            "currency_id.required"=>trans("admin.currency id is required"),
            "currency_id.exists"=>trans("admin.currency id is not exists in our data")
        ];
    }
}
