<?php

namespace App\GraphQL\Queries\Admin\tabletype;

use App\Models\tabletype;

final class Getalltabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $tabletypes=tabletype::all();
        $arr=[];
        foreach($tabletypes as $tabletype ){

            $tabletype->currency;
            $arr[]=$tabletype;


        }
        return $arr;


    }
}
