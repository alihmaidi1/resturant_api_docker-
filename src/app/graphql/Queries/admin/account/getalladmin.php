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
            $adminRole_id=auth("api")->user()->role_id;

            if($adminRole_id == 1){

                return admin::where("id","!=",auth()->user()->id)->get();
            }else{

                $adminResturant=auth("api")->user()->resturant_id;
                return admin::where("resturant_id",$adminResturant)->where("rank","<",$adminRank)->get();
            }



    }
}
