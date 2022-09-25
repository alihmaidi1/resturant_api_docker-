<?php

namespace App\GraphQL\Queries;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;

final class Getbannerwhereshow
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $banners=Cache::rememberForever("banners",function(){

            return banner::all();
        });
        $arr=[];
        foreach($banners as $banner){

            if($banner->where_show==$args["where_show"]){
                $arr[]=$banner;
            }

        }

        return $arr;
    }
}
