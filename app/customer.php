<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $table = 'customer';
    protected $fillable = [
        'nama_customer',
        'no_telp',
        'no_fax'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function penawaran()
    {
        return $this->hasMany('App\penawaran');
    }

    public function detail_customer()
    {
        return $this->hasMany('App\detail_customer');
    }

    public function surat_jalan()
    {
        return $this->hasMany('App\surat_jalan');
    }
}
