<?php

namespace App\GraphQL\Queries\Admin\goodinstorehouse;

use App\Models\good;
use App\Models\storeGood;
use App\Models\storehouse;

final class getallgoodinstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $storegoods=storeGood::where("storehouse_id",$args["storehouse_id"])->get();
        $arr=[];
        foreach($storegoods as $storegood){

            $good=good::find($storegood->good_id);
            $storegood->good=$good;
            $arr[]=$storegood;

        }
        return $arr;

    }
}
