<?php

namespace App\GraphQL\Mutations\Admin\employee;

use App\Models\employee;

final class addemployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $employee=employee::create([
            "name"=>$args["name"],
            "email"=>$args["email"],
            "phone"=>$args["phone"],
            "address"=>$args["address"],
            "date_of_birth"=>$args["date_of_birth"],
            "is_empty"=>$args["is_empty"],
            "vacation_token"=>$args["vacation_token"],
            "gender"=>$args["gender"],
            "resturant_id"=>$args["resturant_id"],
            "manager_id"=>$args["manager_id"],
            "job_id"=>$args["job_id"],
            "experience_id"=>$args["experience_id"]
        ]);
        $employee->message=trans("admin.the employee was added successfully");

        return $employee;

    }
}
