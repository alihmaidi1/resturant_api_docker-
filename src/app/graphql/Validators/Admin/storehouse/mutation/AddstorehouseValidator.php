<?php

namespace App\GraphQL\Validators\Admin\storehouse\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddstorehouseValidator extends Validator
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
            "address"=>["required"],
            "isFull"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"]

        ];
    }
}
