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
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('dob')->nullable();
            $table->String('unit')->nullable();
            $table->String('street')->nullable();
            $table->String('city')->nullable();
            $table->String('zip')->nullable();
            // $table->String('profile_pic')->nullable();
            // $table->String('license_front')->nullable();
            // $table->String('license_back')->nullable();
            // $table->String('photo_id')->nullable();
            $table->string('doc_id')->nullable();
            $table->string('doc_quantity')->nullable();
            $table->string('key_id')->nullable();
            $table->string('key_quantity')->nullable();
            $table->string('kname')->nullable();
            $table->string('klast_name')->nullable();
            $table->string('kemail')->nullable();
            $table->string('kphone')->nullable();
            $table->string('krelation')->nullable();
            $table->string('delivery_info')->nullable();
            // $table->String('profile_check_1')->nullable();
            // $table->String('profile_check_2')->nullable();
            // $table->String('profile_check_3')->nullable();
            // $table->String('payment_counter')->nullable();
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
