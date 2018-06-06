<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = "jz_cate";
    protected $primaryKey = 'cid';

 	//一对多
	public function goods()
	{
	    return $this->hasMany('App\Models\Goods','id');
	}
}

