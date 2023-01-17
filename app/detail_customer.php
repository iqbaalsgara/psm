<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_customer extends Model
{
    //
    protected $table = 'detail_customer';
    protected $fillable = [
        'customer_id',
        'alamat_lengkap',
        'alamat_daerah',
        'provinsi',
        'kota',
        'kecamatan'
    ];

    public function customer()
    {
        return $this->hasOne('App\customer');
    }
}
