<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosDetail extends Model
{
	protected $guarded = ['id'];
	
	public function header()
	{
		return $this->belongsTo('App\PosHeader', 'id', 'pos_header_id');
	}
}
