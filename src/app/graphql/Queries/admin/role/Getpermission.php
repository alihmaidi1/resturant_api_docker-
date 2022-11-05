<?php

namespace App\GraphQL\Queries\Admin\role;

use Illuminate\Support\Facades\Config;
use stdClass;

final class Getpermission
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $arr=config("global.permssion");
        $keys=[];
        $values=[];
        foreach($arr as $key=>$value){
            $keys[]=$key;
            $values[]=$value[Config::get('app.locale')];
        }
        $val=new stdClass();
        $val->key=$keys;
        $val->value=$values;
        return $val;



    }
}
