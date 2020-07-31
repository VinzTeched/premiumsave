<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->integer('payid');
            $table->integer('receiverid')->nullable();
            $table->integer('payment')->nullable();
            $table->integer('payername')->nullable();
            $table->integer('payerphone')->nullable();
            $table->integer('pendingTransaction')->nullable();
            $table->string('receivername', 100)->nullable();
            $table->string('receiverbank', 100)->nullable();
            $table->string('receiverphone', 100)->nullable();
            $table->string('receiveraccount', 100)->nullable();
            $table->string('medium', 100)->nullable();
            $table->string('bank', 100)->nullable();
            $table->string('image', 255)->nullable();
            $table->boolean('hepaid')->nullable();
            $table->boolean('notify')->nullable();
            $table->boolean('paidStatus')->nullable();
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
        Schema::dropIfExists('bonuses');
    }
}
