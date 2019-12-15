<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Posteo extends Model
{
  protected $guarded = [];

  protected $hidden = [
      'activo',
  ];

  public function userId(){
    return $this->user_id;
  }

public function users(){
    return $this->belongsTo(User::class);
  }
}
