<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddwishlistValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "resturant_food_id"=>["required","exists:resturant_foods,id"]

        ];
    }


    public function messages(): array
    {
        return [

            "resturant_food_id.required"=>trans("admin.resturant food id is required"),
            "resturant_food_id.exists"=>trans("admin.resturant food is not exists in our data")

        ];
    }
}
