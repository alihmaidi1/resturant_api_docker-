<?php

namespace App\GraphQL\Mutations;
use \App\Models\table;
final class Gettableresturant
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
