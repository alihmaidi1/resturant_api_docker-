<?php

namespace App\GraphQL\Mutations;

use App\Models\food;
use App\Models\image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Editfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $food=food::find($args["id"]);
        if($args["thumbnail"]!=null){

            unlink("food/".$food->getRawOriginal("thumbnail"));
            $name_thumbnail=rand(0,999999).time().".".$args["thumbnail"]->getClientOriginalExtension();
            Storage::disk("food")->putFileAs("",$args["thumbnail"],$name_thumbnail);
            $food->thumbnail=$name_thumbnail;

        }


        if($args["meta_logo"]!=null){

            unlink("food/".$food->getRawOriginal("meta_logo"));
            $name_meta_logo=rand(0,999999).time().".".$args["meta_logo"]->getClientOriginalExtension();
            Storage::disk("food")->putFileAs("",$args["meta_logo"],$name_meta_logo);
            $food->meta_logo=$name_meta_logo;

        }
        $food->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $food->description=["en"=>$args["description_en"],"ar"=>$args["description_ar"]];
        $food->tag=$args["tag"];
        $food->meta_title=["en"=>$args["meta_title_en"],"ar"=>$args["meta_title_ar"]];
        $food->meta_description=["en"=>$args["meta_description_en"],"ar"=>$args["meta_description_ar"]];
        $food->meta_keyword=$args["meta_keyword"];
        $food->category_id=$args["category_id"];
        $food->save();
        if($args["images"]!=null){

            foreach($food->images as $image){
                unlink(public_path("food/".$image->getRawOriginal("url")));
                $image->delete();
            }
            foreach($args["images"] as $image){

                $namee=rand(0,99999).time().".".$image->getClientOriginalExtension();
                Storage::disk("food")->putFileAs("",$image,$namee);
                image::create([
                    "url"=>$namee,
                    "imageable_type"=>"app\Models\\food",
                    "imageable_id"=>$food->id
                ]);

            }
        }

        Cache::put("food_".$food->id,$food);
        Cache::pull("foods");
        $food->message=trans("admin.the food was updated successfully");
        return $food;

    }
}
