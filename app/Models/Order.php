<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    //属于 user
	public function cate()
    {
        return $this->belongsTo('App\Models\Cate','cid');
    }
}
