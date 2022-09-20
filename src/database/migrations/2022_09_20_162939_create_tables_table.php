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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("person_number");
            $table->boolean("status");
            $table->text("description");
            $table->unsignedBigInteger("resturant_id")->nullable();
            $table->foreign("resturant_id")->references("id")->on("resturants")->onDelete("set null")->onUpdate("cascade");
            $table->unsignedBigInteger("type_id")->nullable();
            $table->foreign("type_id")->references("id")->on("tabletypes")->onDelete("set null")->onUpdate("cascade");
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
        Schema::dropIfExists('tables');
    }
};
