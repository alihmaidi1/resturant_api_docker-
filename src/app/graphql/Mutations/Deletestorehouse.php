<?php

namespace App\GraphQL\Mutations;

use App\Models\storehouse;

final class Deletestorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $storehouse=storehouse::find($args["id"]);
        $storehouse1=$storehouse;
        $storehouse->delete();
        $storehouse1->message=trans("admin.the storehouse was deleted successfully");
        return $storehouse1;
    }
}
