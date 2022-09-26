<?php

namespace App\GraphQL\Validators\Mutation;

use App\Models\resturant_food;
use Nuwave\Lighthouse\Validation\Validator;

final class DeletefoodresturantValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:resturant_foods,id"]

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
