<?php

namespace App\Models;

use App\Models\BaseModel;

class CarModel extends BaseModel
{

    public function __construct($data = null)
    {
        parent::__construct();
        if (!is_null($data)) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->brand = $data['brand'];
            $this->created_at = $data['created_at'];
        }

    }

    public function toSql(): string
    {
        $sql = "INSERT INTO 
        `cars` (`id`, `name`, `brand`) 
    VALUES 
        ('$this->id', '$this->name', '$this->brand')";

        return $sql;
    }

    public string $name = '';
    public string $brand = '';
}