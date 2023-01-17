<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_surat_jalan extends Model
{
    //

    protected $table = 'detail_surat_jalan';

    protected $fillable = [
      'surat_jalan_id',
      'nama_barang',
      'harga_asli',
      'harga_po',
      'tgl_beli',
      'deskripsi',
      'statusitem',
      'unit',
      'qty',
      'user_id'  
    ];

    public function surat_jalan()
    {
        return $this->belongsTo('App\surat_jalan');
    }

    public function surat_jalan1()
    {
        return $this->hasMany('App\surat_jalan');
    }
}
