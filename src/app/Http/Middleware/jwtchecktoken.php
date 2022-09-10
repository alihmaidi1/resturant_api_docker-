<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class jwtchecktoken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        try {

        JWTAuth::parseToken()->authenticate();
       }catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

           return response()->json(["message"=>trans("admin.the code is expired"),"status"=>401,"data"=>[]]);

       } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

           return response()->json(["message"=>trans('admin.the code is not correct'),"status"=>401,"data"=>[]]);

       } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

           return response()->json(["message"=>trans("admin.the code not found"),"status"=>401,"data"=>[]]);
       }catch(\Exception $e){

           return response()->json(["status"=>500,"message"=>trans("admin.none error"),"data"=>[]]);

       }

       return $next($request);






    }
}
