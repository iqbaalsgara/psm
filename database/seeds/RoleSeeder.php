<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama_role' => 'SuperAdmin'
        ]);

        DB::table('roles')->insert([
            'nama_role' => 'Operator'
        ]);

        DB::table('roles')->insert([
            'nama_role' => 'Owner'
        ]);

        DB::table('roles')->insert([
            'nama_role' => 'Office'
        ]);

        DB::table('roles')->insert([
            'nama_role' => 'Warehouse'
        ]);
    }
}
