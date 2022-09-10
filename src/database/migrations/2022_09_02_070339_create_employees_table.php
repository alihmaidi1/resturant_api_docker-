<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("phone");
            $table->string("address");
            $table->unsignedBigInteger("job_id")->nullable();
            $table->foreign("job_id")->references("id")->on("jobs")->onUpdate("cascade")->onDelete("set null");
            $table->date("date_of_birth");
            $table->unsignedBigInteger("manager_id")->nullable();
            $table->foreign("manager_id")->references("id")->on("employees")->onUpdate("cascade")->onDelete("set null");
            $table->unsignedBigInteger("resturant_id")->nullable();
            $table->foreign("resturant_id")->references("id")->on("resturants")->onUpdate("cascade")->onDelete("set null");
            $table->boolean("is_empty");
            $table->unsignedBigInteger("experience_id")->nullable();
            $table->foreign("experience_id")->references("id")->on("employee_experiences")->onUpdate("cascade")->onDelete("set null");
            $table->integer("vacation_token")->default(0);
            $table->boolean("gender");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
