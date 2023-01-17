<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    //

    protected $table = 'pengiriman';

    protected $fillable = [
        'nama_pengiriman',
        'tgl_pengiriman',
        'user_id'
    ];

    public function detail_pengiriman()
    {
        return $this->hasMany('App\detail_pengiriman');
    }
}
