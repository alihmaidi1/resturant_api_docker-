<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admin\Account;


Route::group(["prefix"=>"user"],function(){

    Route::get("changepassword/{token}",[Account::class,"changeuserpassword"])->middleware("authJWT");

    // Route::post("/checkToken",[Account::class,"checkusertoken"])->middleware("auth:user_api");




});










