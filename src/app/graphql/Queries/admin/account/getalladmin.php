<?php

namespace App\GraphQL\Queries\Admin\account;

use App\Models\admin;

final class getalladmin
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $adminRank=auth("api")->user()->rank;
        $adminResturant=auth("api")->user()->resturant;

        if($adminResturant==null){

            return admin::where("id","!=",auth()->user()->id)->get();
        }else{

            return admin::where("resturant_id",$adminResturant)->where("rank","<",$adminRank)->get();
        }



    }
}
