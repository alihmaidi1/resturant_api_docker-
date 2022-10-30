<?php

namespace App\GraphQL\Mutations\User\suggest;

use App\Exceptions\CustomException;
use App\Models\suggest;

final class deletesuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $suggest=suggest::find($args["id"]);
        $user=auth("web")->user();
        if($user->id!=$suggest->user_id){

            throw new CustomException(trans("admin.you don't have perrmion to delete this suggest"));

        }else{

            $suggest1=$suggest;
            $suggest->delete();
            $suggest1->message=trans("admin.the suggest was deleted successfully");
            return $suggest1;

        }


    }
}
