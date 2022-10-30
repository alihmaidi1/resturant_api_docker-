<?php

namespace App\GraphQL\Mutations\User\suggest;

use App\Models\suggest;

final class editsuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $suggest=suggest::find($args["id"]);
        $suggest->description=$args["description"];
        $suggest->save();
        $suggest->message=trans("admin.the suggest was updated successfully");
        return $suggest;

    }
}
