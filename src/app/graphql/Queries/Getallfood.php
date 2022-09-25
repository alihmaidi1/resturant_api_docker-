<?php

namespace App\GraphQL\Queries;

use App\Models\food;
use Illuminate\Support\Facades\Cache;

final class Getallfood
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
