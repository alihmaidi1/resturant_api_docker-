<?php

namespace App\GraphQL\Mutations;
use \App\Models\employee;
final class Editemployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $employee=employee::find($args["id"]);
        $employee->name=$args["name"];
        $employee->email=$args["email"];
        $employee->phone=$args["phone"];
        $employee->address=$args["address"];
        $employee->date_of_birth=$args["date_of_birth"];
        $employee->is_empty=$args["is_empty"];
        $employee->vacation_token=$args["vacation_token"];
        $employee->gender=$args["gender"];
        $employee->resturant_id=$args["resturant_id"];
        $employee->manager_id=$args["manager_id"];
        $employee->job_id=$args["job_id"];
        $employee->experience_id=$args["experience_id"];
        $employee->save();
        $employee->message=trans("admin.the employee was updated successfully");
        return $employee;

    }
}
