<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id'); //口コミid
            $table->tinyInteger('rate'); //評価
            $table->string('review'); //レビュー
            $table->bigInteger('user_id')->unsigned()->index(); //ユーザーid
            $table->bigInteger('hotel_id')->unsigned()->index(); //ホテルid
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //外部キー設定
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade'); //外部キー設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
