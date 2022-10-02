<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use App\Models\reservation;
use App\repo\Paypal;
use Illuminate\Support\Facades\DB;

final class Editreservation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        DB::beginTransaction();
        try{


            $reservation=reservation::where("start","<=",$args["start"])->where("end",">=",$args["end"])->where("table_id",$args["table_id"])->where("status",1)->count();
            if($reservation!=0){
                throw new CustomException(trans("admin.this table is reservated at this time"));

            }else{
                $reservation=reservation::find($args["id"]);
                if($reservation->status==1){

                throw new CustomException(trans("admin.we have error"));

                }
                $reservation->table_id=$args["table_id"];
                $reservation->name=$args["name"];
                $reservation->start=$args["start"];
                $reservation->end=$args["end"];
                $reservation->save();
                $total=getTotalPrice($args["start"],$args["end"],$reservation->table->type->price);
                $reservation->price=$total;
                $currency=$reservation->table->type->currency;
                $reservation->currency=$currency;
                $paypal=new Paypal($total,"USD");
                $reservation->paymentUrl=$paypal->getLink($reservation->id);
                $reservation->message=trans("admin.the reservation was updated successfully and you need to continue the reservation by payment");
                DB::commit();
                return $reservation;

        }

        }catch(\Exception $ex){

            DB::rollBack();
            throw new CustomException(trans("admin.we have error"));

        }











    }
}
