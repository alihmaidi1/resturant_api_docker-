<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class lang
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

        if($request->header("lang")!=null){


            foreach(Config::get("global.lang") as $lang){

                if($lang==$request->header("lang")){

                    app()->setLocale($request->header("lang"));

                    return $next($request);


                }

            }


            return response()->json(['message'=>"lang is not correct"],310);

        }else{


            return response()->json(['message'=>"lang input not found"],310);

        }
    }
}
