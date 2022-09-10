<?php

namespace App\Http\Controllers\api\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\api\admin\account\changepassword as changepasswordRequest;

class Account extends Controller
{




    public function tokenInfo($email,$password){

         $client=DB::table('oauth_clients')->first();

        return Http::asForm()->post(env("APP_URL")."/oauth/token",[
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $email,
            'password' => $password,

        ]);


    }




    public function changepassword(changepasswordRequest $request,$base_url){
        try{

        $admin=auth("reset_password")->user();
            return redirect(env("front_base_url")."/reset-password/$admin->id");

        }catch(\Exception $ex){

            abort(404);
        }

    }








}
