<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    // 关联商品
	public function order_goods()
    {
        return $this->hasMany('App\Models\Goods','id','gid');
    }

    // 关联用户
	public function order_user()
    {
        return $this->belongsTo('App\User','uid');
    }
}
