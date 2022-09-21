<?php

namespace App\GraphQL\Mutations;

use App\Models\job;

final class Editjob
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $job=job::find($args["id"]);
        $job->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $job->salary=$args["salary"];
        $job->currency_id=$args["currency_id"];
        $job->save();
        $job->message=trans("admin.the job was updated successully");
        return $job;

    }
}
