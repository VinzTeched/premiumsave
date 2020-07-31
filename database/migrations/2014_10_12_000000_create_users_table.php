<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('phoneprefix', 5);
            $table->string('phonenumber', 20);
            $table->string('account_name', 100)->nullable();
            $table->string('account_no', 10)->nullable();
            $table->string('bank', 100)->nullable();
            $table->string('ref_no', 11)->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('account_added')->nullable();
            $table->boolean('suspend')->nullable();
            $table->string('upline', 11)->nullable();
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
