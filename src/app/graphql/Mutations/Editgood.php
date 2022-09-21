<?php

namespace App\GraphQL\Mutations;
use \App\Models\good;
final class Editgood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $good=good::find($args["id"]);
        $good->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $good->save();
        $good->message=trans("admin.the good was updated successfully");
        return $good;
    }
}
