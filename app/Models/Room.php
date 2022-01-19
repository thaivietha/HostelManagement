<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function user()
  {
    return $this->belongsTo('App\User','host_id');
  }
  public function customers()
  {
    return $this->hasMany('App\Models\Customer');
  }
  public function bills()
  {
    return $this->hasMany('App\Models\Bill','room_id');
  }

}
