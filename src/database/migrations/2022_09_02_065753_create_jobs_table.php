<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->string("salary");
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
        Schema::dropIfExists('jobs');
    }
};
