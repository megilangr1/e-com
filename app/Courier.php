<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $guarded = [
        'id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
