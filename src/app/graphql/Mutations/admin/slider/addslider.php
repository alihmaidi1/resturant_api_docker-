<?php

namespace App\GraphQL\Mutations\Admin\slider;

use App\Models\slider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class addslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $logo=$args["logo"];
        $name=rand(0,99999999).".".$logo->getClientOriginalExtension();
        Storage::disk("slider")->putFileAs("",$logo,$name);
        $slider=slider::create([
            "logo"=>$name,
            "status"=>$args["status"],
            "rank"=>$args["rank"]
        ]);

        $slider->message=trans("admin.the slider was added successfully");
        Cache::put("slider:".$slider->id,$slider);
        Cache::pull("sliders");
        return Cache::get("slider:".$slider->id);


    }
}
