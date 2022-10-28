<?php

namespace App\GraphQL\Mutations\Admin\job;

use App\Models\job;

final class deletejob
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $job=job::find($args["id"]);
        $job1=$job;
        $job->delete();
        $job1->message=trans("admin.the job was deleted successfully");
        return $job1;


    }
}
