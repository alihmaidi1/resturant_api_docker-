<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditstorehouseValidator extends Validator
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
            "resturant_id"=>["required","exists:resturants,id"],
            "id"=>["required","exists:storehouses,id"]


        ];
    }

    public function messages(): array
    {
        return [

            "name.required"=>trans("admin.name is required"),
            "address.required"=>trans("admin.address is required"),
            "isFull.required"=>trans("admin.isFull is required"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")

        ];
    }

}
