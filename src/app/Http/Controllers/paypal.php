<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;

class paypal extends Controller
{


    public function success(Request $request){


        $reservation=reservation::find($request->id);
        $start=$reservation->start;
        $end=$reservation->end;
        $table_id=$reservation->table_id;
        $reservation->status=1;
        $reservation->save();
        reservation::where("start","<=",$start)->where("end",">=",$end)->where("table_id",$table_id)->where("status",0)->delete();

        return redirect(env("redirect_paypal_success"));


    }

}
