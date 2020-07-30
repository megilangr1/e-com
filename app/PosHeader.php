<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosHeader extends Model
{
	protected $guarded = ['id'];

	public function detail()
	{
		return $this->hasMany('App\PosDetail', 'pos_header_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
