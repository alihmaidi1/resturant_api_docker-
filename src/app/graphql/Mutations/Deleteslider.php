<?php

namespace App\GraphQL\Mutations;

use App\Models\slider;
use Illuminate\Support\Facades\Cache;

final class Deleteslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $slider=slider::find($args["id"]);
        Cache::pull("sliders");
        Cache::pull("slider_".$slider->id);
        unlink(public_path("slider/".$slider->getRawOriginal("logo")));
        $slider1=$slider;
        $slider1->message=trans("admin.the slider was deleted successfully");
        $slider->delete();
        return $slider1;
    }
}
