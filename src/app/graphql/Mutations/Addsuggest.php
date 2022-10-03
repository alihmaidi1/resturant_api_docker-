<?php

namespace App\GraphQL\Mutations;

use App\Models\suggest;

final class Addsuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("user_api")->user();
        $suggest=suggest::create([
            "description"=>$args["description"],
            "user_id"=>$user->id
        ]);

        $suggest->message=trans("admin.the suggest was created successfully");
        return $suggest;


    }
}
