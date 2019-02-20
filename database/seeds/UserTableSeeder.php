<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@aluthads.lk',
            'tel_no' => '0703113217',
            'type' => (int)2,
            'password' => bcrypt('adminpass'),
            'email_verified_at'=>Carbon::now()
        ]);
    }
}
