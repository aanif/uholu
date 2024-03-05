<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToCustomerSupports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_supports', function (Blueprint $table) {
            //
            $table->dropColumn('message');
        });

        Schema::table('customer_supports', function (Blueprint $table) {
            //
            $table->text('message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_supports', function (Blueprint $table) {
            //
            $table->dropColumn('message');
        });
    }
}
