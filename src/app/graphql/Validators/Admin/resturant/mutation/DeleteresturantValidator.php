<?php

namespace App\GraphQL\Validators\Admin\resturant\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class DeleteresturantValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:resturants,id"]

        ];
    }

    public function messages(): array  {

        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")



        ];


    }


}
