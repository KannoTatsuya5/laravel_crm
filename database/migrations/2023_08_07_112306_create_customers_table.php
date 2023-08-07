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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名前');
            $table->string('kana')->comment('かな');
            $table->string('tel')->unique()->comment('電話番号');
            $table->string('email')->comment('メールアドレス');
            $table->string('postcode')->comment('郵便番号');
            $table->string('address')->comment('住所');
            $table->date('birthday')->nullable()->comment('誕生日');
            $table->tinyInteger('gender')->comment('0男性, 1女性、2その他');
            $table->text('memo')->nullable()->comment('メモ');
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
        Schema::dropIfExists('customers');
    }
};
