<?php

namespace App\GraphQL\Queries\Reservation;

use App\Models\reservation;

final class getreservationbyid
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $reservation=reservation::find($args["id"]);

            $reservation->price=getTotalPrice($reservation->start,$reservation->end,$reservation->table->type->price);
            $currency=$reservation->table->type->currency;
            $reservation->currency=$currency;
            $reservation->message=trans("admin.the data was fetched successfully");
            return $reservation;

    }
}
