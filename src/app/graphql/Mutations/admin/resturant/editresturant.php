<?php

namespace App\GraphQL\Mutations\Admin\resturant;

use App\Models\resturant;
use Illuminate\Support\Facades\Cache;

final class editresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $resturant=resturant::find($args["id"]);
        $resturant->name=$args["name"];
        $resturant->address=$args["address"];
        $resturant->save();
        $resturant->message=trans("admin.the resturant was updated successfully");
        Cache::put("resturant:".$resturant->id,$resturant);
        return $resturant;


    }
}
