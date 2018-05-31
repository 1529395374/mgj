<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    public $table = 'carousel';
    public $primaryKey = 'cid';
    protected $fillable = ['img_one','img_two','img_three','url_one','url_two','url_three'];
}
