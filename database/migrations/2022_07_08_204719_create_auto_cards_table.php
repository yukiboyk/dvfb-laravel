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
        Schema::create('auto_cards', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('username');
            $table->string('telco');
            $table->string('code');
            $table->string('serial');
            $table->integer('amount');
            $table->integer('receive_amount');
            $table->string('status');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('auto_cards');
    }
};
