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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("code")->nullable();
            $table->string("reset_code")->nullable();
            $table->integer("balance")->default(0);
            $table->boolean("copon_notification")->default(0)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean("status")->default(0);
            $table->string("operation_code")->nullable();

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
        Schema::dropIfExists('users');
    }
};
