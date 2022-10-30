<?php

namespace App\GraphQL\Queries\Admin\foodinresturant;

use App\Models\resturant_food;

final class getallresturantfood
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
