<?php

namespace App\GraphQL\Queries\Admin\setting;

use App\Models\currency;
use stdClass;

final class getsetting
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $settings=config("global.settings");
        $arr=new stdClass();
        $arr->name=$settings["name"];
        $arr->status=$settings["status"];
        $arr->address=$settings["address"];
        $arr->phone=$settings["phone"];
        $arr->meta_title=$settings["meta_title"][app()->getLocale()];
        $arr->meta_description=$settings["meta_description"][app()->getLocale()];
        $arr->meta_keyword=$settings["meta_keyword"];
        if($settings["meta_logo"]==null){

            $arr->meta_logo=null;

        }else{

            $arr->meta_logo=asset("setting/".$settings["meta_logo"]);

        }

        $arr->balance_status=$settings["balance_status"];
        $arr->balance_charge=$settings["balance_charge"];
        $arr->currency=currency::find($settings["currency_id"]);
        $arr->open_at=$settings["open_at"];
        $arr->close_at=$settings["close_at"];
        $days=[];




        $arr->day_open=$settings["day_open"][app()->getLocale()];
        $arr->facebook_status=$settings["facebook_status"];
        $arr->facebook_link=$settings["facebook_link"];
        $arr->whatsapp_status=$settings["whatsapp_status"];
        $arr->whatsapp_link=$settings["whatsapp_link"];
        $arr->telegram_status=$settings["telegram_status"];
        $arr->telegram_link=$settings["telegram_link"];
        $arr->instagram_status=$settings["instagram_status"];
        $arr->instagram_link=$settings["instagram_link"];
        $arr->twitter_status=$settings["twitter_status"];
        $arr->twitter_link=$settings["twitter_link"];
        $arr->paypal_status=$settings["paypal_status"];
        $arr->mastercard_status=$settings["mastercard_status"];
        $arr->owner_name=$settings["owner_name"];
        if($settings["logo"]==null){

            $arr->logo=null;
        }else{

            $arr->logo=asset("setting/".$settings["logo"]);

        }


        $arr->message=trans("admin.the setting was fetched successfully");
        return $arr;


    }
}
