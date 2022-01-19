<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    public function room()
    {
         return $this->belongsTo('App\Models\Room','room_id');
    }
    public function billdetails()
    {
         return $this->hasMany('App\Models\BillDetail','bill_id');
    }
    public function customers()
    {
         return $this->belongsTo('App\Models\Customers');
    }
}
