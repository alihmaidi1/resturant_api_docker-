<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditemployeeValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:employees,id"],
            "name"=>["required"],
            "email"=>["required","email"],
            "phone"=>["required"],
            "address"=>["required"],
            "date_of_birth"=>["required","date"],
            "is_empty"=>["required"],
            "vacation_token"=>["required"],
            "gender"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"],
            "manager_id"=>["nullable","exists:employees,id"],
            "job_id"=>["required","exists:jobs,id"],
            "experience_id"=>["required","exists:employee_experiences,id"]


        ];
    }
    public function messages(): array
    {
        return [

            "name.required"=>trans("admin.name is required"),
            "email.required"=>trans("admin.email is required"),
            "email.email"=>trans("admin.this field should be email"),
            "phone.required"=>trans("admin.phone is required"),
            "address.required"=>trans("admin.address is required"),
            "date_of_birth.required"=>trans("admin.date of birth is required"),
            "date_of_birth.date"=>trans("admin.this field should be date"),
            "is_empty.required"=>trans("admin.is empty field is required"),
            "vacation_token"=>trans("admin.vacation token is required"),
            "gender"=>trans("admin.gender is required"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "manager_id.exists"=>trans("admin.manager id is not exists in our data"),
            "job_id.required"=>trans("admin.job id is required"),
            "job_id.exists"=>trans("admin.job id is not exists in our data"),
            "experience_id.required"=>trans("admin.experiece id is required"),
            "experience_id.exists"=>trans("admin.experiece id is not exists in our data"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")

        ];
    }


}
