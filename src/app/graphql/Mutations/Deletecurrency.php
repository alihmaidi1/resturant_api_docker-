<?php

namespace App\GraphQL\Mutations;
use App\Exceptions\CustomException;

use \App\Models\currency;
final class Deletecurrency
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $currency=currency::find($args["id"]);
        if($currency->is_default_for_website){

            throw new CustomException(trans("admin.the currency is default in your system"));


        }
        $currency1=$currency;
        $currency->delete();
        $currency1->message=trans("admin.the currency was deleted successfully");
        $currency1->is_default_for_website=($currency1->is_default_for_website)?trans("admin.yes"):trans("admin.no");

        return $currency1;


    }
}
