<?php

namespace App\Imports;

use App\Pembukuan;
use Maatwebsite\Excel\Concerns\ToModel;

class PembukuanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pembukuan([
        'surat_jalan_id' => $row[1],
        'user_id' => $row[2],
        'nama_barang' => $row[3],
        'harga_asli' => $row[4],
        'harga_po' => $row[5],
        'tgl_beli' => $row[6],
        'deskripsi' => $row[7],
        'statusitem' => $row[8],
        'unit' => $row[9],
        'qty' => $row[10],
        ]);
    }
}
