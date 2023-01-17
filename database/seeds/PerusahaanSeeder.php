<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT PANCARAN SINAR MATAHARI',
            'singkatan' => 'PSM',
            'no_telp' => '0218755981',
            'no_fax' => '0218755981',
            'alamat_perusahaan' => 'Jl Lingkungan 1 Ciriung No. 37 Cibinong, Kab. Bogor, Jawa Barat, 16918',
            'provinsi' => 'Jawa Barat',
            'kota' => 'Kabupaten Bogor',
            'kecamatan' => 'Cibinong',
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 1,
            'bank' => 'No Rekening. 6830399991',
        ]);

        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'CV INDAH RAYA',
            'singkatan' => 'IR',
            'no_telp' => '0218755981',
            'no_fax' => '0218755981',
            'alamat_perusahaan' => 'Jl Lingkungan 1 Ciriung No. 37 Cibinong, Kab. Bogor, Jawa Barat, 16918',
            'provinsi' => 'Jawa Barat',
            'kota' => 'Kabupaten Bogor',
            'kecamatan' => 'Cibinong',
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 1,
            'bank' => 'No Rekening. 6830399991',
        ]);
    }
}
