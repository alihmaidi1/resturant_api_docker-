<?php

namespace App\GraphQL\Queries\Admin\food;

use App\Models\food;
use Illuminate\Support\Facades\Cache;

final class getallfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return Cache::rememberForever("foods",function(){

            return food::all();
        });



    }
}
