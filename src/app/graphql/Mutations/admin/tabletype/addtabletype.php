<?php

namespace App\GraphQL\Mutations\Admin\tabletype;

use App\Models\tabletype;

final class addtabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $tableType=tabletype::create([
            "name"=>["en"=>$args["name_en"],"ar"=>$args["name_ar"]],
            "price"=>$args["price"],
            "currency_id"=>$args["currency_id"]
        ]);
        $tableType->message=trans("admin.the table type was added successfully");
        return $tableType;


    }
}
