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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->string("password");
            $table->string("reset_code")->nullable();
            $table->unsignedBigInteger("role_id")->nullable();
            $table->foreign("role_id")->references("id")->on("roles")->onDelete("set null")->onUpdate("cascade");
            $table->integer("rank");
            $table->unsignedBigInteger("resturant_id")->nullable();
            $table->foreign("resturant_id")->references("id")->on("resturants")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('admins');
    }
};
