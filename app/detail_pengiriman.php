<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_pengiriman extends Model
{
    //
    protected $table = 'detail_pengiriman';
    protected $fillable = [
        'pengiriman_id',
        'surat_jalan_id'
    ];

    public function surat_jalan()
    {
        return $this->belongsTo('App\surat_jalan');
    }

    public function pengiriman()
    {
        return $this->belongsTo('App\pengiriman');
    }
}
