<?php

namespace App\GraphQL\Mutations\Admin\banner;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;

final class deletebanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $banner=banner::find($args["id"]);
        Cache::pull("banners");
        Cache::pull("banner:".$banner->id);
        unlink(public_path("banner/".$banner->getRawOriginal("logo")));
        $banner->message=trans("admin.the banner was deleted successfully");

        return $banner;


    }
}
