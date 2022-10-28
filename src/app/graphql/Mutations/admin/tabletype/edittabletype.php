<?php

namespace App\GraphQL\Mutations\Admin\tabletype;

use App\Models\tabletype;

final class edittabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $tabletype=tabletype::find($args["id"]);
        $tabletype->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $tabletype->price=$args["price"];
        $tabletype->currency_id=$args["currency_id"];
        $tabletype->save();
        $tabletype->message=trans("admin.the table type was updated successfully");
        return $tabletype;



    }
}
