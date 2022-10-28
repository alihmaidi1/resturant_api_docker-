<?php

namespace App\GraphQL\Queries\Admin\slider;

use App\Models\slider;
use Illuminate\Support\Facades\Cache;

final class getallslider
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
