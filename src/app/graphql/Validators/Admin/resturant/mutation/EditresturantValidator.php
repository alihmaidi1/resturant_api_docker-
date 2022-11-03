<?php

namespace App\GraphQL\Validators\Admin\resturant\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditresturantValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [


            "id"=>["required","exists:resturants,id"],
            "address"=>["required","string"],
            "name"=>["required","string"]


        ];
    }

    public function messages(): array  {

        return [

            "address.required"=>trans("admin.the address is required"),
            "address.string"=>trans("admin.the address should be string"),
            "name.required"=>trans("admin.the name is required"),
            "name.string"=>trans("admin.the name should be string"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")



        ];


    }


}
