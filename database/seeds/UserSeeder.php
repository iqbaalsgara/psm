<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Muhammad Iqbal',
            'email' => 'iqbal.sgara@gmail.com',
            'password' => Hash::make('iqbal123'),
            'status' => 'aktif',
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
