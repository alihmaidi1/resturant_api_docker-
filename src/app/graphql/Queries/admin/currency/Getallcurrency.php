<?php

namespace App\GraphQL\Queries\Admin\currency;

use App\Models\currency;

final class Getallcurrency
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $currencys=currency::all();
        $arr=[];
        foreach($currencys as $currency){

            $currency->is_default_for_website=($currency->is_default_for_website)?trans("admin.yes"):trans("admin.no");
            $arr[]=$currency;

        }

        return $arr;


    }
}
