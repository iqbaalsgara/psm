<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','role_id','ttd'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function diffForHumanDate($value)
    {
        return Carbon::now()->createFromTimestamp(strtotime($value))->diffForHumans();
    }

    public function role()
    {
        return $this->belongsTo('App\role');
    }

    public function perusahaan()
    {
        return $this->hasMany('App\perusahaan');
    }

    public function Penawaran()
    {
        return $this->hasMany('App\Penawaran');
    }
}
