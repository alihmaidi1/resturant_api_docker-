<?php

namespace App\GraphQL\Queries\Admin\employee;

use App\Models\employee;

final class getallemployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $resturantID=auth("api")->user()->resturant_id;
        if($resturantID==null){

            return employee::all();
        }else{

            return employee::where("resturant_id",$resturantID)->get();
        }



    }
}
