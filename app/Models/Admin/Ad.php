<?php

namespace App\models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
	// 限定模型
    public $table = 'advers';
    public $primaryKey = 'id';
    // public $timestamps = false;
    public $guarded = [];
}
