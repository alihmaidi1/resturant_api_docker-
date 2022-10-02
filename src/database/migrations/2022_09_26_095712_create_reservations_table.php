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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->unsignedBigInteger("table_id");
            $table->foreign("table_id")->references("id")->on("tables")->onDelete("cascade")->onUpdate("cascade");
            $table->boolean("status");
            $table->string("name");
            $table->timestamp("start");
            $table->timestamp("end");
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
        Schema::dropIfExists('reservations');
    }
};
