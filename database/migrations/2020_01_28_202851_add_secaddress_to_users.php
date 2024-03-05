<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSecaddressToUsers extends Migration
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
            $table->string('sec_city')->nullable();
            $table->string('sec_unit')->nullable();
            $table->string('sec_street')->nullable();
            $table->string('sec_zip')->nullable();
            $table->string('sec_info')->nullable();
            $table->string('sec_address_check')->nullable();
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
            $table->dropColumn('sec_city');
            $table->dropColumn('sec_unit');
            $table->dropColumn('sec_street');
            $table->dropColumn('sec_zip');
            $table->dropColumn('sec_info');
            $table->dropColumn('sec_address_check');
        });
    }
}
