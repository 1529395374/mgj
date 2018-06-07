<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $table = 'car';
    public $primaryKey = 'id';
    public $timestamps = true;
    public $guarded = [];

    public function car_good()
    {
    	return $this->hasOne('App\Models\Admin\Goods','gid');
    }
}
