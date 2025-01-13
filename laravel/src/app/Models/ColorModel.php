<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Colors
class ColorModel extends Model
{
    protected $table = 'colors';

    protected $fillable = ['name', 'url', 'hex'];

    //public $timestamps = false;
    //
}
