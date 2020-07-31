<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->integer('userid');
            $table->string('name', 100)->nullable();
            $table->integer('reamount')->nullable();
            $table->string('bank', 100)->nullable();
            $table->string('acct_no', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->integer('payerid')->nullable();
            $table->string('payername', 100)->nullable();
            $table->string('payerphone', 100)->nullable();
            $table->boolean('selected')->nullable();
            $table->boolean('hepaid')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('withdrawals');
    }
}
