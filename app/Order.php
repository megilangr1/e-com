<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function confirm()
    {
        return $this->hasOne(Confirm::class);
    }

    public function courier()
    {
        return $this->hasOne('App\Courier', 'order_id', 'id');
    }
}
