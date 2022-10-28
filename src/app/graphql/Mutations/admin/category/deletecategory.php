<?php

namespace App\GraphQL\Mutations\Admin\category;

use App\Models\category;
use Illuminate\Support\Facades\Cache;

final class deletecategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $category=category::find($args["id"]);
        Cache::pull("category:".$category->id);
        Cache::pull("categorys");
        unlink(public_path("category/".$category->getRawOriginal("logo")));
        unlink(public_path("category/".$category->getRawOriginal("meta_logo")));
        foreach($category->images as $image){

            unlink(public_path("category/".$image->getRawOriginal("url")));
        }
        $category1=$category;
        $category1->message=trans("admin.the category was deleted successfully");
        $category->delete();
        return $category1;


    }
}
