<?php

namespace App\GraphQL\Mutations;
use \App\Models\table;
final class Deletetable
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $table=table::find($args["id"]);
        $table1=$table;
        $table->delete();
        $table1->message=trans("admin.the table was deelted successfully");
        return $table1;

    }
}
