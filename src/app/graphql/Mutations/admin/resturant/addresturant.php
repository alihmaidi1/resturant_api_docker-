<?php

namespace App\GraphQL\Mutations\Admin\resturant;

use App\Models\resturant;
use Illuminate\Support\Facades\Cache;

final class addresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)

    {

        $resturant=resturant::create([

            "address"=>$args["address"],
            "name"=>$args["name"]
        ]);

        Cache::put("resturant:".$resturant->id,$resturant);
        $resturant->message=trans("admin.the resturant was created successfully");
        Cache::pull("resturants");
        return $resturant;



    }
}
