<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'ad@ad.co.jp',
            'password' => Hash::make('password'),
            'image' => '',
            'profile' => '管理者',
            'role' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
