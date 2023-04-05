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
        Schema::create('regulations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Idorder');
            $table->dateTime('DateTimePayment');
            $table->string('PaymentMethod');
            $table->float('AmountPaid');
            $table->string('StatusPayment')->default('pending');
            $table->timestamps();

            $table->foreign('Idorder')->references('id')->on('orders')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulations');
    }
};
