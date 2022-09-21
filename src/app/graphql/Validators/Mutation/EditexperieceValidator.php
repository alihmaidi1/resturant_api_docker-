<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditexperieceValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:employee_experiences,id"],
            "year"=>["required"],
            "benifit"=>["required"],
            "vacation"=>["required"]


        ];
    }
    public function messages(): array
    {
        return [

            "year.required"=>trans("admin.year is required"),
            "benifit.required"=>trans("admin.benifit is required"),
            "vacation.required"=>trans("admin.vacation is required"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")
        ];
    }

}
