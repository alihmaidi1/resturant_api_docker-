<?php

namespace App\GraphQL\Queries;

use App\Models\resturant_food;

final class Getallresturantfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return resturant_food::all();

    }
}
