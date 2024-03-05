<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('customer_id');
            $table->String('customer_id_stripe');
            $table->String('keys');
            $table->String('docs');
            $table->String('cost');
            $table->String('unit');
            $table->String('street');
            $table->String('city');
            $table->String('zip');
            $table->String('info')->nullable();
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
        Schema::dropIfExists('pickups');
    }
}
