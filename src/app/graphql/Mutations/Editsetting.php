<?php

namespace App\GraphQL\Mutations;

use App\Models\currency;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use stdClass;

final class Editsetting
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $settings=config("global.settings");
        $arr=[];
        $object=new stdClass();
        $file1=$args["meta_logo"];
        if($file1!=null && $settings["meta_logo"]!=null){
            unlink(public_path("setting/".$settings["meta_logo"]));
        }
        if($file1!=null){
            $meta_logo_name="meta_logo.".$file1->getClientOriginalExtension();
            Storage::disk("setting")->putFileAs(null,$file1,$meta_logo_name);
            $arr["meta_logo"]=$meta_logo_name;
            $object->meta_logo=asset("setting/".$meta_logo_name);

        }

        $file2=$args["logo"];
        if($file2!=null && $settings["logo"]!=null){
            unlink(public_path("setting/".$settings["logo"]));

        }
        if($file2!=null){
            $logoname="logo.".$file2->getClientOriginalExtension();
            Storage::disk("setting")->putFileAs(null,$file2,$logoname);
            $arr["logo"]=$logoname;
            $object->logo=asset("setting/".$logoname);

        }
        $arr["name"]=$args["name"];
        $object->name=$args["name"];
        $arr["status"]=$args["status"];
        $object->status=$args["status"];

        $arr["address"]=$args["address"];
        $object->address=$args["address"];
        $arr["phone"]=$args["phone"];
        $object->phone=$args["phone"];
        $arr["meta_title"]=["en"=>$args["meta_title_en"],"ar"=>$args["meta_title_ar"]];
        $object->meta_title=$args["meta_title_".app()->getLocale()];
        $arr["meta_description"]=["en"=>$args["meta_description_en"],"ar"=>$args["meta_description_ar"]];
        $object->meta_description=$args["meta_description_".app()->getLocale()];
        $arr["meta_keyword"]=$args["meta_keyword"];
        $object->meta_keyword=$args["meta_keyword"];
        $arr["balance_status"]=$args["balance_status"];
        $object->balance_status=$args["balance_status"];
        $arr["balance_charge"]=$args["balance_charge"];
        $object->balance_charge=$args["balance_charge"];
        $arr["currency_id"]=$args["currency_id"];
        $object->currency=currency::find($args["currency_id"]);
        $arr["open_at"]=$args["open_at"];
        $object->open_at=$args["open_at"];
        $arr["close_at"]=$args["close_at"];
        $object->close_at=$args["close_at"];
        $arr["day_open"]=["en"=>$args["day_open_en"],"ar"=>$args["day_open_ar"]];
        $object->day_open=$args["day_open_".app()->getLocale()];
        $arr["facebook_status"]=$args["facebook_status"];
        $object->facebook_status=$args["facebook_status"];
        $arr["facebook_link"]=$args["facebook_link"];
        $object->facebook_link=$args["facebook_link"];
        $arr["whatsapp_status"]=$args["whatsapp_status"];
        $object->whatsapp_status=$args["whatsapp_status"];
        $arr["whatsapp_link"]=$args["whatsapp_link"];
        $object->whatsapp_link=$args["whatsapp_link"];
        $arr["telegram_status"]=$args["telegram_status"];
        $object->telegram_status=$args["telegram_status"];
        $arr["telegram_link"]=$args["telegram_link"];
        $object->telegram_link=$args["telegram_link"];
        $arr["instagram_status"]=$args["instagram_status"];
        $object->instagram_status=$args["instagram_status"];
        $arr["instagram_link"]=$args["instagram_link"];
        $object->instagram_link=$args["instagram_link"];
        $arr["twitter_status"]=$args["twitter_status"];
        $object->twitter_status=$args["twitter_status"];
        $arr["twitter_link"]=$args["twitter_link"];
        $object->twitter_link=$args["twitter_link"];
        $arr["paypal_status"]=$args["paypal_status"];
        $object->paypal_status=$args["paypal_status"];
        $arr["mastercard_status"]=$args["mastercard_status"];
        $object->mastercard_status=$args["mastercard_status"];
        $arr["owner_name"]=$args["owner_name"];
        $object->owner_name=$args["owner_name"];
        config()->set("global.settings",$arr);
        $object->message=trans("admin.the setting was updated successfully");
        return $object;

    }
}
