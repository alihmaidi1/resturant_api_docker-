<?php

namespace App\GraphQL\Mutations\Admin\table;

use App\Models\table;

final class edittable
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $table=table::find($args["id"]);
        $table->name=$args["name"];
        $table->person_number=$args["person_number"];
        $table->description=["en"=>$args["description_en"],"ar"=>$args["description_ar"]];
        $table->status=$args["status"];
        $table->resturant_id=$args["resturant_id"];
        $table->type_id=$args["type_id"];
        $table->save();
        $table->message=trans("admin.the table was updated successfully");
        return $table;

    }
}
