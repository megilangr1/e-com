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

	public function product()
	{
		return $this->belongsTo('App\Product', 'product_id', 'id');
	}
}
