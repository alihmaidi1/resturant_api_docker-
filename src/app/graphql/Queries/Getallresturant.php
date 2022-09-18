<?php

namespace App\GraphQL\Queries;
use \App\Models\resturant;
use Illuminate\Support\Facades\Cache;
final class Getallresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $value = Cache::remember('resturants',null, function () {
            return resturant::get();
        });
        return $value;

    }
}
