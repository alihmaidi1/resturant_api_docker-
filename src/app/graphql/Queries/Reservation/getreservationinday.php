<?php

namespace App\GraphQL\Queries\Reservation;

use App\Models\reservation;
use Carbon\Carbon;

final class getreservationinday
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $nextday=Carbon::createFromDate($args["day"])->addDay();
        $reservations=reservation::where("table_id",$args["table_id"])->where("start",">=",$args["day"])->where("start","<=",$nextday)->get();
        return $reservations;

    }
}
