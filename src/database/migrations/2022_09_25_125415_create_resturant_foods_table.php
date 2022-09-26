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
        Schema::create('resturant_foods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("resturant_id");
            $table->foreign("resturant_id")->references("id")->on("resturants")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("food_id");
            $table->foreign("food_id")->references("id")->on("food")->onDelete("cascade")->onUpdate("cascade");
            $table->boolean("isVisiable");
            $table->integer("price");
            $table->unsignedBigInteger("currency_id")->nullable();
            $table->foreign("currency_id")->references("id")->on("currencies")->onDelete("set null")->onUpdate("cascade");
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
        Schema::dropIfExists('resturant_foods');
    }
};
