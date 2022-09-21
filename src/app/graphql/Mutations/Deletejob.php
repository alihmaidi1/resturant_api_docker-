<?php

namespace App\GraphQL\Mutations;

use App\Models\job;

final class Deletejob
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
