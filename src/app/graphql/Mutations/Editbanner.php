<?php

namespace App\GraphQL\Mutations;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Editbanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $banner=banner::find($args["id"]);
        if($args["logo"]!=null){

            unlink(public_path("banner/".$banner->getRawOriginal("logo")));
            $name=time().".".$args["logo"]->getClientOriginalExtension();
            Storage::disk("banner")->putFileAs("",$args["logo"],$name);
            $banner->logo=$name;
        }

        $banner->status=$args["status"];
        $banner->rank=$args["rank"];
        $banner->url=$args["url"];
        $banner->where_show=$args["where_show"];
        $banner->save();
        Cache::pull("banners");
        Cache::put("banner_".$banner->id,$banner);
        $banner->message=trans("admin.the banner was updated successfully");
        return $banner;


    }
}
