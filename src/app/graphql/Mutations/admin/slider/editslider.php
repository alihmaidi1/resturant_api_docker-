<?php

namespace App\GraphQL\Mutations\Admin\slider;

use App\Models\slider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class editslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $slider=slider::find($args["id"]);

        if($args["logo"]!=null){

            unlink(public_path("slider/".$slider->getRawOriginal("logo")));
            $name=rand().".".$args["logo"]->getClientOriginalExtension();
            Storage::disk("slider")->putFileAs("",$args["logo"],$name);
            $slider->logo=$name;

        }
        $slider->status=$args["status"];
        $slider->rank=$args["rank"];
        $slider->save();
        Cache::pull("sliders");
        Cache::put("slider:".$slider->id,$slider);
        $slider->message=trans("admin.the slider was updated successfully");
        return $slider;

    }
}
