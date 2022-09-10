<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\job;
use App\Models\employee_experience;
use App\Models\employee;
use App\Models\currency;
class create_employee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        currency::create([
            "name"=>["en"=>"Dular","ar"=>"دولار"],
            "code"=>"$",
            "is_default_for_website"=>1,
            "precent_value_in_dular"=>1
        ]);

        job::create([

            "name"=>["en"=>"cheef","ar"=>"طباخ"],
            "salary"=>200,
            "currency_id"=>1

        ]);
        employee_experience::create([
            "year"=>1,
            "benifit"=>34,
            "vacation"=>21
        ]);

        employee::create([

            "name"=>"ahmed",
            "email"=>"ahmed@gmail.com",
            "phone"=>"0952345646",
            "address"=>"Syria,Aleppo",
            "job_id"=>1,
            "date_of_birth"=>"2001-03-22",
            "manager_id"=>null,
            "resturant_id"=>1,
            "is_empty"=>1,
            "experience_id"=>1,
            "vacation_token"=>2,
            "gender"=>0



        ]);
    }
}
