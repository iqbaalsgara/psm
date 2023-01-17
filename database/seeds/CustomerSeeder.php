<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            'nama_customer' => 'PT INDOCEMENT TUNGGAL PRAKARSA TBK.',
            'no_telp' => '0212512121',
            'no_fax' => '0212510408',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer')->insert([
            'nama_customer' => 'PT PAM LYONNAISE JAYA',
            'no_telp' => '0215706880',
            'no_fax' => '0215700349',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer')->insert([
            'nama_customer' => 'PT SAMSUNG ELECTRONICS INDONESIA',
            'no_telp' => '02189837114',
            'no_fax' => '02189837114',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer')->insert([
            'nama_customer' => 'PT TAK TEXTILES INDONESIA',
            'no_telp' => '021893431618',
            'no_fax' => '02189343206',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer')->insert([
            'nama_customer' => 'PT TASBLOCK INDUSTRY INDONESIA',
            'no_telp' => '02166677835',
            'no_fax' => '02166677835',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer')->insert([
            'nama_customer' => 'PT RHYTHM KYOSHIN INDONESIA',
            'no_telp' => '0218980945',
            'no_fax' => '0218980945',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer')->insert([
            'nama_customer' => 'PT DAIHATSU DRIVETRAIN MANUFACTURING INDONESIA',
            'no_telp' => '02678637900',
            'no_fax' => '02678637900',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer')->insert([
            'nama_customer' => 'PT PERTAMINA',
            'no_telp' => '135',
            'no_fax' => '135',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer')->insert([
            'nama_customer' => 'PT WAAGNER BIRO INDONESIA',
            'no_telp' => '02175924355',
            'no_fax' => '02175924358',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
