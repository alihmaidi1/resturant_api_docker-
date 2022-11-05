<?php

namespace App\GraphQL\Mutations\Reservation;

use App\Models\reservation;

final class Deletereservation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $reservation=reservation::find($args["id"]);
        $reservation1=$reservation;
        $reservation->delete();
        $reservation1->price=getTotalPrice($reservation1->start,$reservation1->end,$reservation1->table->type->price);
        $currency=$reservation1->table->type->currency;
        $reservation1->currency=$currency;
        $reservation1->message=trans("admin.the reservation was deleted successfully");
        return $reservation1;


    }
}
