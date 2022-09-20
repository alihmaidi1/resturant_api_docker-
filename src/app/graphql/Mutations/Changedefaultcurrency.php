<?php

namespace App\GraphQL\Mutations;
use \App\Models\currency;
final class Changedefaultcurrency
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $currency=currency::find($args["id"]);
        $currency1=currency::where("is_default_for_website",1)->first();
        $currency1->is_default_for_website=0;
        $currency1->save();
        $currency->is_default_for_website=1;
        $currency->save();
        $currency->message=trans("admin.the currency status was updated successfully");
        $currency->is_default_for_website=($currency->is_default_for_website)?trans("admin.yes"):trans("admin.no");
        return $currency;
    }
}
