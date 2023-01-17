<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembukuan extends Model
{
    protected $table = "detail_surat_jalan";
    protected $fillable = [
        'surat_jalan_id',
        'user_id',
        'nama_barang',
        'harga_asli',
        'harga_po',
        'tgl_beli',
        'deskripsi',
        'statusitem',
        'unit',
        'qty',
    ];
}
