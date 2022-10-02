<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditreservationValidator extends Validator
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
            "name"=>["required"],
            "start"=>["required","date","after_or_equal:".date("Y-m-d H:i:s")],
            "end"=>["required","date","after:start"],
            "id"=>["required","exists:reservations,id"]
        ];
    }


    public function messages(): array
    {
        return [


            "table_id.required"=>trans("admin.table id is required"),
            "table_id.exists"=>trans("admin.table id is not exists"),
            "name.required"=>trans("admin.name is required"),
            "start.required"=>trans("admin.the start date is required"),
            "end.required"=>trans("admin.the end date is required"),
            "end.after"=>trans("admin.the end date should be greater from start date"),
            "start.after_or_equal"=>trans("admin.the start date should be after now"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")

        ];
    }
}
