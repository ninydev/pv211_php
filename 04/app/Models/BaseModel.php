<?php

namespace App\Models;

abstract class BaseModel
{
    public function __construct(){
        $this->created_at = date('Y-m-d H:i:s');
        $this->id = self::$hidden_id++;
    }

    private static int $hidden_id = 0;

    public int $id;

    public ?string $created_at = null;
}