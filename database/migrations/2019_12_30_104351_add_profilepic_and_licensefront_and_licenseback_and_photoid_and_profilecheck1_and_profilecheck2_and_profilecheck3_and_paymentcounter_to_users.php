<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilepicAndLicensefrontAndLicensebackAndPhotoidAndProfilecheck1AndProfilecheck2AndProfilecheck3AndPaymentcounterToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->String('profile_pic')->nullable();
            $table->String('license_front')->nullable();
            $table->String('license_back')->nullable();
            $table->String('photo_id')->nullable();
            $table->String('profile_check_1')->nullable();
            $table->String('profile_check_2')->nullable();
            $table->String('profile_check_3')->nullable();
            $table->String('payment_counter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
