<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    public $table = 'carousel';
    public $primaryKey = 'cid';
    protected $fillable = ['profile','url_profile'];
}
