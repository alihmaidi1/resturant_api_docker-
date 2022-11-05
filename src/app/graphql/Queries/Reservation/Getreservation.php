<?php

namespace App\GraphQL\Queries\Reservation;

use App\Exceptions\CustomException;
use App\Models\reservation;

final class Getreservation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $reservation=reservation::where("code",$args["code"])->first();
        if($reservation!=null){

            $reservation->price=getTotalPrice($reservation->start,$reservation->end,$reservation->table->type->price);
            $currency=$reservation->table->type->currency;
            $reservation->currency=$currency;
            $reservation->message=trans("admin.the data was fetched successfully");
            return $reservation;
        }
        throw new CustomException(trans("admin.we don't have any data"));



    }
}
