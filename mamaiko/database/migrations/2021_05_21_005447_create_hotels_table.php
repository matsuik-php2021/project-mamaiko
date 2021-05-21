<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); //ホテル名
            $table->integer('category_id')->unsigned()->index(); //分類コード、エラーが起きたら真っ先に見直す
            $table->string('address'); //住所
            $table->string('access'); //アクセス
            $table->string('description'); //紹介文
            $table->time('checkin_time'); //チェックイン時間
            $table->time('checkout_time'); //チェックアウト時間
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); //外部キー設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
