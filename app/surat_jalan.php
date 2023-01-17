<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_jalan extends Model
{
    //
    protected $table = 'surat_jalan';

    protected $fillable = [
        'perusahaan_id',
        'customer_id',
        'detail_customer_id',
        'no_sj',
        'po',
        'pr',
        'status',
        'tgl_input',
        'tgl_pembelian',
        'tgl_paket',
        'tgl_pengiriman',
        'tgl_arsip',
        'tgl_invoice', 
        'no_inv', 
        'partial',
        'note',
        'user_id'
    ]; 

    public function customer()
    {
        return $this->belongsTo('App\customer');
    }

    public function detail_customer()
    {
        return $this->belongsTo('App\detail_customer');
    }

    public function perusahaan()
    {
        return $this->belongsTo('App\perusahaan');
    }

    public function detail_pengiriman()
    {
        return $this->hasOne('App\detail_pengiriman');
    }

    public function detail_surat_jalan()
    {
        return $this->hasMany('App\detail_surat_jalan');
    }

    public function detail_surat_jalan1()
    {
        return $this->belongsTo('App\detail_surat_jalan');
    }
}
