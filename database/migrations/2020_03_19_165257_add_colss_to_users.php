<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColssToUsers extends Migration
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
            $table->text('user_admin')->nullable();
            $table->text('items_admin')->nullable();
            $table->text('activereq_admin')->nullable();
            $table->text('activereq_counter')->nullable();
            $table->text('historyreq_admin')->nullable();
            $table->text('message_admin')->nullable();
            $table->text('scanreq_admin')->nullable();
            $table->text('scanreq_counter')->nullable();
            $table->text('scanhistory_admin')->nullable();
            $table->text('contact_admin')->nullable();
            $table->text('contact_counter')->nullable();
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
            $table->dropColumn('user_admin');
            $table->dropColumn('items_admin');
            $table->dropColumn('activereq_admin');
            $table->dropColumn('activereq_counter');
            $table->dropColumn('historyreq_admin');
            $table->dropColumn('message_admin');
            $table->dropColumn('scanreq_admin');
            $table->dropColumn('scanreq_counter');
            $table->dropColumn('scanhistory_admin');
            $table->dropColumn('contact_admin');
            $table->dropColumn('contact_counter');
        });
    }
}
