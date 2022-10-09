<?php

namespace App\Http\Controllers\api\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\api\admin\account\changepassword as changepasswordRequest;
use App\Models\message;
use Illuminate\Http\Request;

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




    public function changepassword(changepasswordRequest $request,$token){
        try{

        $admin=auth("reset_password")->user();
            return redirect(env("front_base_url")."/reset-password/$token");

        }catch(\Exception $ex){

            abort(404);
        }

    }



    public function changeuserpassword(Request $request,$token){


        try{

            $user=auth("reset_user_password")->user();

                return redirect(env("front_base_url")."/reset-user-password/$token");
            }catch(\Exception $ex){

                abort(404);
            }



    }


    public function checkusertoken(Request $request){

        $user=auth('user_api')->user();
        return $user;

    }


    public function checkAdminToken(Request$request){


        $admin=auth("api")->user();

        return $admin;

    }



}
