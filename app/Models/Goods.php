<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
	use SoftDeletes;
    protected $table = "goods";
    protected $primaryKey = 'id';

    //属于 jz_cate
	public function cate()
    {
        return $this->belongsTo('App\Models\Cate','cid');
    }
    //属于 car
    public function good_car()
    {
      return $this->hasOne('App\Models\Home\Car','gid');
    }

    public function goods_order()
   {
      return $this->hasOne('App\Models\Home\Orders','gid');
   }
}
