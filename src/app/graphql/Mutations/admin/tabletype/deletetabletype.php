<?php

namespace App\GraphQL\Mutations\Admin\tabletype;

use App\Models\tabletype;

final class deletetabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $tabletype=tabletype::find($args["id"]);
        $tabletype->currency;
        $tabletype1=$tabletype;
        $tabletype->delete();
        $tabletype1->message=trans("admin.the table type was deleted successfully");
        return $tabletype1;


    }
}
