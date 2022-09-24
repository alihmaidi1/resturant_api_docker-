<?php

namespace App\GraphQL\Queries;

use App\Models\slider;
use Illuminate\Support\Facades\Cache;

final class Getallslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return Cache::rememberForever("sliders",function(){

            return slider::all();

        });

    }
}
