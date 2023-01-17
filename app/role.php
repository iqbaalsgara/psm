<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //
    protected $fillable = [
        'nama_role'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
