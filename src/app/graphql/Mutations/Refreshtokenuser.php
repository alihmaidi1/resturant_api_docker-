<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

final class Refreshtokenuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $client=DB::table('oauth_clients')->where("provider","users")->first();
        $val= Http::asForm()->post(env("APP_URL")."/oauth/token",[
            'grant_type' => 'refresh_token',
            'refresh_token' => $args['your_refresh_token'],
            'client_id' => $client->id,
            'client_secret' => $client->secret,

        ]);

        if($val->status()==200){

            return $val->json();

        }else{

            throw new CustomException(trans("admin.refresh token is not correct"));




        }



    }
}
