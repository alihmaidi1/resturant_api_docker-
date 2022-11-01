<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admin\Account;

Route::group(["prefix"=>"admin"], function(){


        Route::get("changepassword/{token}",[Account::class,"changepassword"])->middleware("authJWT");

        // Route::group(['middleware'=>['auth:api']],function(){

        //     Route::post("/checkToken",[Account::class,"checkAdminToken"]);


        // });






    });

Route::post("/checkToken",[Account::class,"checkToken"]);
