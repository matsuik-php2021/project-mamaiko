<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_id')->unsigned()->index();
            $table->bigInteger('plan_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->date('reservation_date');
            $table->integer('room_count');
            $table->timestamps();

            $table->foreign('hotel_id')->reference('id')->on('hotels')->onDelete('cascade');
            $table->foreign('plan_id')->reference('id')->on('plans')->onDelete('cascade');
            $table->foreign('user_id')->reference('id')->on('users')->onDelete('cascade');
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
}
