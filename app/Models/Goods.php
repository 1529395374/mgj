<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = "goods";
    protected $primaryKey = 'id';

    //属于 jz_cate
	public function cate()
    {
        return $this->belongsTo('App\Models\cate','cid');
    }
}
