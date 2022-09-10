<?php
namespace App\GraphQL\Validators\Mutation;
use Nuwave\Lighthouse\Validation\Validator;
final class CreateadminValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "email"=>["required","email","unique:admins,email"],
            "password"=>["required"],
            "role_id"=>["exists:roles,id","required","not_in:1"],
            "employee_id"=>["exists:employees,id","required","unique:admins,employee_id"],


        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("admin.email field is required"),
            "email.email"=>trans("admin.email field should be email"),
            "email.unique"=>trans("admin.The Email is found in our data"),
            "password.required"=>trans("admin.password field is required"),
            "role_id.exists"=>trans("admin.the role is not found in our data"),
            "role_id.required"=>trans("admin.the role is required"),
            "employee_id.exists"=>trans("admin.the employee is not found in our data"),
            "employee_id.required"=>trans("admin.the employee is required"),
            "employee_id.unique"=>trans("admin.the employee already has admin account"),
            "role_id.not_in"=>trans("admin.this role for one admin")
        ];
    }



}
