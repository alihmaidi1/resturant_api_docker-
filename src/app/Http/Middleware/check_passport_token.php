<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Http;
use Closure;
use Illuminate\Http\Request;

class check_passport_token
{

    public function handle(Request $request, Closure $next)
    {

        // $token=$request->bearerToken();
        // if($token!=null){

        //     $response = Http::withHeaders([
        //         'Content-Type' => 'application/json',
        //         'Accept' => 'application/json',
        //         'Authorization' => 'Bearer '.$token,
        //     ])->get('https://passport-app.test/api/user');
        //     if($response->status()==200){

                return $next($request);

        //     }else{

        //         return response()->json(["message"=>trans("admin.token not correct")],403);

        //     }


        // }else{

        //     return response()->json(["message"=>trans("admin.token not found")],403);


        // }





    }
}
