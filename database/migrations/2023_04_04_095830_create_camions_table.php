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
        Schema::create('camions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDriver');
            $table->string('Camion_location');
            $table->string('Camion_status');
            $table->unsignedBigInteger('camion_type_id');
            $table->timestamps();

            $table->foreign('camion_type_id')->references('id')->on('camion_types')->onDelete('cascade');

            $table->foreign('idDriver')->references('id')->on('users')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camions');
    }
};
