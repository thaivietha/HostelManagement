<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
    // public function customer()
    // {
    //     return $this->belongsTo('App\Models\Room');
    // }
}
