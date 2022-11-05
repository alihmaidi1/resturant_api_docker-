<?php

namespace App\GraphQL\Validators\Admin\reservation\query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetreservationindayValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "table_id"=>["required","exists:tables,id"],
            "day"=>["required","date"]

        ];
    }


    public function messages(): array
    {

        return [

            "table_id.required"=>trans("admin.id is required"),
            "table_id.exists"=>trans("admin.id is not exists in our data"),
            "day.required"=>trans("admin.day field is required"),
            "day.date"=>trans("admin.day field should be date")

        ];
    }
}
