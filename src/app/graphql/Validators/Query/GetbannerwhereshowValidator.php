<?php

namespace App\GraphQL\Validators\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetbannerwhereshowValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "where_show"=>["required","exists:banners,where_show"]

        ];
    }

    public function messages(): array
    {

        return [

            "where_show.required"=>trans("admin.where show is required"),
            "where_show.exists"=>trans("admin.where show is not exists in our data")

        ];
    }
}
