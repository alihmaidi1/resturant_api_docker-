<?php

namespace App\GraphQL\Mutations\Admin\currency;

use App\Models\currency;

final class addcurreny
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $currency=currency::create([
            "code"=>$args["code"],
            "name"=>["ar"=>$args["name_ar"],"en"=>$args["name_en"]],
            "precent_value_in_dular"=>$args["precent_value_in_dular"],

        ]);
        $currency->message=trans("admin.the currency was created successfully");
        $currency->is_default_for_website=($currency->is_default_for_website)?trans("admin.yes"):trans("admin.no");
        return $currency;


    }
}
