<?php

namespace App\GraphQL\Mutations\Admin\food;

use App\Models\food;
use Illuminate\Support\Facades\Cache;

final class deletefood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $food=food::find($args["id"]);
        Cache::pull("foods");
        Cache::pull("food_".$food->id);
        unlink(public_path("food/".$food->getRawOriginal("thumbnail")));
        unlink(public_path("food/".$food->getRawOriginal("meta_logo")));
        foreach($food->images as $image){

            unlink(public_path("food/".$image->getRawOriginal("url")));

        }

        $food->message=trans("admin.the food was deleted successfully");
        return $food;


    }
}
