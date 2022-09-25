<?php

namespace App\GraphQL\Mutations;

use App\Models\food;
use App\Models\image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Addfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $thumbnail=$args["thumbnail"];
        $thumbnail_name=rand(0,999999).time().".".$thumbnail->getClientOriginalExtension();
        Storage::disk("food")->putFileAs("",$thumbnail,$thumbnail_name);

        $meta_logo=$args["meta_logo"];
        $meta_logo_name=rand(0,999999).time().".".$meta_logo->getClientOriginalExtension();
        Storage::disk("food")->putFileAs("",$meta_logo,$meta_logo_name);

        $food=food::create([
            "name"=>["en"=>$args["name_en"],"ar"=>$args["name_ar"]],
            "thumbnail"=>$thumbnail_name,
            "description"=>["en"=>$args["description_en"],"ar"=>$args["description_ar"]],
            "tag"=>$args["tag"],
            "meta_title"=>["en"=>$args["meta_title_en"],"ar"=>$args["meta_title_ar"]],
            "meta_description"=>["en"=>$args["meta_description_en"],"ar"=>$args["meta_description_ar"]],
            "meta_logo"=>$meta_logo_name,
            "meta_keyword"=>$args["meta_keyword"],
            "category_id"=>$args["category_id"],
        ]);

        foreach($args["images"] as $image){

            $namee=rand(0,999999).time().".".$image->getClientOriginalExtension();
            Storage::disk("food")->putFileAs("",$image,$namee);
            image::create([

                "url"=>$namee,
                "imageable_type"=>"app\Models\\food",
                "imageable_id"=>$food->id
            ]);

        }

        Cache::pull("foods");
        Cache::put("food_".$food->id,$food);
        $food->message=trans("admin.the food was added successfully");
        return $food;



    }
}
