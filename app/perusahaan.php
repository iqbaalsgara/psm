<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    
    protected $table = 'perusahaan';

    protected $fillable = [
        'nama_perusahaan',
        'singkatan',
        'no_telp',
        'no_fax',
        'alamat_perusahaan',
        'provinsi',
        'kota',
        'kecamatan',
        'logo',
        'bank',
        'aninvoice',
        'kop_surat',
        'stempel',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function penawaran()
    {
        return $this->hasMany('App\penawaran');
    }
}
