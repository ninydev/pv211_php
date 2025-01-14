<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Colors
class CarModel extends Model
{
    protected $table = 'cars';

    protected $fillable = ['name'];
}
