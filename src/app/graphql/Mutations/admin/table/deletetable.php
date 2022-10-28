<?php

namespace App\GraphQL\Mutations\Admin\table;

use App\Models\table;

final class deletetable
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
