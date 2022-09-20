<?php

namespace App\GraphQL\Mutations;
use \App\models\table;
final class Addtable
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $table=table::create([

            "name"=>$args["name"],
            "description"=>["en"=>$args["description_en"],"ar"=>$args["description_ar"]],
            "person_number"=>$args["person_number"],
            "status"=>$args["status"],
            "resturant_id"=>$args["resturant_id"],
            "type_id"=>$args["type_id"]
        ]);
        $table->message=trans("admin.the table was added successfully");
        return $table;
    }
}
