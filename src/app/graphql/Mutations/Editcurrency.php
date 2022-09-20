<?php

namespace App\GraphQL\Mutations;
use  \App\Models\currency;
final class Editcurrency
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $currency=currency::find($args["id"]);
        $currency->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $currency->code=$args["code"];
        $currency->precent_value_in_dular=$args["precent_value_in_dular"];
        if($args["is_default_for_website"]==1){

        $currency1=currency::where("is_default_for_website",1)->first();
        $currency1->is_default_for_website=0;
        $currency1->save();
        $currency->is_default_for_website=$args["is_default_for_website"];


        }
        $currency->save();
        $currency->is_default_for_website=($currency->is_default_for_website)?trans("admin.yes"):trans("admin.no");


        $currency->message=trans("admin.the currency was updated successfully");
        return $currency;

    }
}
