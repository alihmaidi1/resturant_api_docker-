<?php

namespace App\GraphQL\Queries\Admin\table;

use App\Models\table;

final class gettableresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $tables=table::where("resturant_id",$args["resturant_id"])->get();
        return $tables;


    }
}
