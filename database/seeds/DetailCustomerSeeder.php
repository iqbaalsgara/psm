<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DetailCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_customer')->insert([
            'customer_id' => '1',
            'alamat_lengkap' => 'Jl. Mayor Oking Jayaatmaja, Citeureup, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat 16810',
            'alamat_daerah' => 'Citeureup',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '1',
            'alamat_lengkap' => 'Jl. Raya Cirebon - Bandung, Palimanan Bar., Kec. Gempol, Kabupaten Cirebon, Jawa Barat 45161',
            'alamat_daerah' => 'Cirebon',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        

        DB::table('detail_customer')->insert([
            'customer_id' => '1',
            'alamat_lengkap' => 'Komplek perkantoran PT. Indocement, Tarjun, Kec. Kelumpang Hilir, Kab. Kotabaru, Kalimantan Selatan 72161',
            'alamat_daerah' => 'Tarjun Kalimantan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '2',
            'alamat_lengkap' => 'Dipo Tower Lt. 16 Jl. Jend.Gatot Subroto Kav.51-52, Jakarta - 10260',
            'alamat_daerah' => 'Jakarta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '3',
            'alamat_lengkap' => 'Jl. Jababeka Raya Blok F. 29 No.31, Harja Mekar, Kec. Cikarang Utara, Kabupaten Bekasi, Jawa Barat 17530',
            'alamat_daerah' => 'Cikarang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '4',
            'alamat_lengkap' => 'Cikarang Industrial Estate, Jl. Jababeka XI Blok G 11-15, Harjamekar, Cikarang Utara, Bekasi, Jawa Barat',
            'alamat_daerah' => 'Cikarang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '5',
            'alamat_lengkap' => 'Jl. Raya Serang - Jkt No.KM 68, Julang, Kec. Cikande, Kabupaten Serang, Banten 42186',
            'alamat_daerah' => 'Cikande',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '6',
            'alamat_lengkap' => 'Blok T Kawasan MM 2100, Jl. Bali I No.1, Gandamekar, Cikarang Barat, Bekasi Regency, Jawa Kulon 17530',
            'alamat_daerah' => 'Cikarang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '7',
            'alamat_lengkap' => 'Jl. Surya Madya VI, Kutanegara, Kec. Ciampel, Karawang, Jawa Barat 41363',
            'alamat_daerah' => 'Karawang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '8',
            'alamat_lengkap' => 'Grha Pertamina Jl. Medan Merdeka Timur No.11-13 Jakarta 10110 Indonesia',
            'alamat_daerah' => 'Jakarta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('detail_customer')->insert([
            'customer_id' => '9',
            'alamat_lengkap' => 'Sukatani, Cikande, Serang, Banten 42186, Indonesia Kota Serang, Banten, 42186',
            'alamat_daerah' => 'Cikande',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
