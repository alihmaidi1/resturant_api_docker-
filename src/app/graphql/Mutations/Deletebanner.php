<?php

namespace App\GraphQL\Mutations;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;

final class Deletebanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $banner=banner::find($args["id"]);
        Cache::pull("banners");
        Cache::pull("banner_".$banner->id);
        unlink("banner/".$banner->getRawOriginal("logo"));
        $banner->message=trans("admin.the banner was deleted successfully");

        return $banner;
    }
}
