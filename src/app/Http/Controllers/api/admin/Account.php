<?php

namespace App\Http\Controllers\api\admin;

use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\api\admin\account\changepassword as changepasswordRequest;
use App\Models\message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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



    public function checkToken(Request $request){

        $admin=$request->user("api");
        if($admin!=null){

            $admin->type=1;
            return $admin;
        }

        $user=$request->user("web");
        if($user!=null){

            $user->type=2;
            return $user;

        }


            throw new Exception("token invalid",401);







    }



}
