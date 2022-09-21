<?php

namespace App\GraphQL\Mutations;

use App\Models\job;

final class Addjob
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $job=job::create([
            "name"=>["en"=>$args["name_en"],"ar"=>$args["name_ar"]],
            "salary"=>$args["salary"],
            "currency_id"=>$args["currency_id"]
        ]);
        $job->message=trans("admin.the job was add successfully");
        return $job;
    }
}
