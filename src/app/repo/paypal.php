<?php
namespace App\repo;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

class Paypal{

    public $total;
    public $currency;
    public function __construct($total,$currency)
    {

        $this->total=$total;
        $this->currency=$currency;

    }



    public function getToken(){

        $response=Http::asForm()->withBasicAuth(env("Paypal_Client_Id"),env("Paypal_Secret"))
        ->post("https://api-m.sandbox.paypal.com/v1/oauth2/token",["grant_type"=>"client_credentials"]);
        if($response->status()<200 || $response->status()>299){

            throw new CustomException(trans("admin.this table is reservated at this time"));


        }
        $response=json_decode($response);
        return $response->access_token;

    }


    public function getLink($id){

        $content=[];
        $content["intent"]="sale";
        $content["payer"]=["payment_method"=>"paypal"];
        $content["transactions"]=[["amount"=>["total"=>$this->total,"currency"=>$this->currency]]];
        $content["redirect_urls"]=["return_url"=>env("APP_URL")."/paypal_success?id=".$id,"cancel_url"=>env("redirect_paypal_cancel")];
        $response=Http::withBody(json_encode($content),"application/json")->withHeaders(["Authorization"=>"Bearer ".$this->getToken()])->post("https://api-m.sandbox.paypal.com/v1/payments/payment");
        if($response->status()<200 || $response->status()>299){

            throw new CustomException(trans("admin.this table is reservated at this time"));


        }

        $response=json_decode($response);
        $url=$response->links[1]->href;
        return $url;


    }


}
