<?php

namespace App\GraphQL\Mutations;

use stdClass;

final class Changepaypalsetting
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        updateEnv(["Paypal_Client_Id"=>$args["client_id"],"Paypal_Secret"=>$args["secret"]]);
        $env=new stdClass();
        $env->clientId=$args["client_id"];
        $env->secret=$args["secret"];
        $env->message=trans("admin.the information about paypal setting was updated successfully");
        return $env;
    }
}
