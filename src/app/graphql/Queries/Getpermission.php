<?php

namespace App\GraphQL\Queries;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\Config;
use stdClass;

final class Getpermission
{

    public function __invoke($_, array $args,GraphQLContext $context)
    {

        $arr=config("global.permssion");
        $keys=[];
        $values=[];
        foreach($arr as $key=>$value){
            $keys[]=$key;
            // $arr1[$key]=$value[Config::get('app.locale')];
            $values[]=$value[Config::get('app.locale')];
        }
        $val=new stdClass();
        $val->key=$keys;
        $val->value=$values;
        return $val;
    }
}
