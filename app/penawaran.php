<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penawaran extends Model
{
    //
    protected $table = 'penawaran';
    protected $fillable = ['perusahaan_id','customer_id','detail_customer_id','attn','no_penawaran_harga','tgl','alamat_delivery','delivery','alamat_lengkap','keterangan','nambutpenawaran'];

    public function detail_penawaran()
    {
        return $this->hasMany('App\detail_penawaran');
    }

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

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function penawaran()
    {
        return $this->hasMany('App\penawaran');
    }

}
