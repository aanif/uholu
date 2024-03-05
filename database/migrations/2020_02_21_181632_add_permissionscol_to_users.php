<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermissionscolToUsers extends Migration
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
            $table->string('storage')->nullable();
            $table->string('delivery')->nullable();
            $table->string('pickup')->nullable();
            $table->string('active')->nullable();
            $table->string('history')->nullable();
            $table->string('staff')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('staff_quantity')->nullable();
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
            $table->dropColumn('storage');
            $table->dropColumn('delivery');
            $table->dropColumn('pickup');
            $table->dropColumn('active');
            $table->dropColumn('history');
            $table->dropColumn('staff');
            $table->dropColumn('parent_id');
            $table->dropColumn('staff_quantity');
            //
        });
    }
}
