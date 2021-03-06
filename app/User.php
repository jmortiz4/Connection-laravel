<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Posteo;
use App\Amigo;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


  public function posteos(){
      return $this->hasMany(Posteo::class);
    }

    public function amigos(){
        return $this->belongsToMany('App\User','amigo_user', 'user_id', 'amigo_id')->withPivot('status');
    }

    // public function solicitantes()
    // {
    //   return $this->amigos('user_id', 'amigo_id')->where('amigo_user.status', 0);
    // }
    //
    // public function amistades()
    // {
    //   return $this->amigos('amigo_id', 'user_id')->where('amigo_user.status', 1);
    // }

    public function scopeActive($query)
      {
        return $query->where('activo', 1);
      }
}
