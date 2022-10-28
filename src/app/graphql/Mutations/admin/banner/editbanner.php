<?php

namespace App\GraphQL\Mutations\Admin\banner;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class editbanner
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
        Cache::put("banner:".$banner->id,$banner);
        $banner->message=trans("admin.the banner was updated successfully");
        return $banner;


    }
}
