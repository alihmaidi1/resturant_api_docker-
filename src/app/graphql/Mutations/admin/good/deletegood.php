<?php

namespace App\GraphQL\Mutations\Admin\good;

use App\Models\good;

final class deletegood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $good=good::find($args["id"]);
        $good1=$good;
        $good->delete();
        $good1->message=trans("admin.the good was deleted successfully");
        return $good1;


    }
}
