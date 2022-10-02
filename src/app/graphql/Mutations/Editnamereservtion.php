<?php

namespace App\GraphQL\Mutations;

use App\Models\reservation;

final class Editnamereservtion
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $reservation=reservation::find($args["id"]);
        $reservation->name=$args["name"];
        $reservation->save();
        $reservation->message=trans("admin.the reservation name was updated successfully");
        $reservation->price=getTotalPrice($reservation->start,$reservation->end,$reservation->table->type->price);
        $currency=$reservation->table->type->currency;
        $reservation->currency=$currency;
        return $reservation;

    }
}
