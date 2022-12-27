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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('roomNumber');
            $table->string('faculty');
            $table->timestamps();
        });

        Schema::create('cars', function (Blueprint $table) {
            $table->string('plateNumber')->primary();
            $table->foreignId('resident_ID')->references('id')->on('residents');
            $table->string('carType');
            $table->string('carColour');
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
        Schema::dropIfExists('residents');
    }
};
