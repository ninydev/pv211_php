<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

abstract class BaseModel
{
    public function __construct(){
        $this->created_at = date('Y-m-d H:i:s');
        $this->id = Uuid::uuid4();
        //$this->id = self::$hidden_id++;
    }

    private static int $hidden_id = 0;

    public string $id;

    public ?string $created_at = null;
}