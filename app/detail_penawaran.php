<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_penawaran extends Model
{
    //
    protected $table = 'detail_penawaran';
    protected $fillable = ['penawaran_id','nama_barang','unit','qty','harga','diskon'];

    public function penawaran()
    {
        return $this->belongsTo('App\penawaran');
    }
}
