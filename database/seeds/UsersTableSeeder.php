<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //heloo
        DB::table('users')->insert([
            'name' => 'Administrator',
            'last_name' => 'Uholu',
            'password' => Hash::make('adminuholu'),
            'email' => 'admin@uholu.com',
            'phone' => '11111111111',
            'payment_counter' => '2',
            'role' => 'admin',
            'parent_id' => 'head',
            'user_admin' => '1',
            'items_admin' => '1',
            'activereq_admin' => '1',
            'activereq_counter' => '0',
            'historyreq_admin' => '1',
            'message_admin' => '1',
            'scanreq_admin' => '1',
            'scanreq_counter' => '0',
            'scanhistory_admin' => '1',
            'contact_admin' => '1',
            'contact_counter' => '0',
            'support_admin' => '1',
            'support_counter' => '0',
            'created_at'  => now(),
            'updated_at'  => now(),

        ]);
    }
}
