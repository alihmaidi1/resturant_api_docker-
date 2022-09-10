<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\resturant;
class create_returant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        resturant::create([

            "address"=>"syria,Aleppo",
            "name"=>["en"=>"Cake","ar"=>"كعكة"]

        ]);

    }
}
