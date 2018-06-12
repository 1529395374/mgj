<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use SoftDeletes;
    public $table = 'orders';
    public $primaryKey = 'id';
    public $timestamps = true;
    public $guarded = [];
}
