<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Colors
class ColorModel extends Model
{
    protected $table = 'colors';

    protected $fillable = ['name', 'url', 'hex'];

    public function cars(): HasMany
    {
        return $this->hasMany(CarColorModel::class, 'color_id');
    }

}
