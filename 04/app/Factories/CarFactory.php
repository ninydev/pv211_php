<?php

namespace App\Factories;

use App\Factories\BaseFactory;
use App\Models\CarModel;

class CarFactory extends BaseFactory
{

    public function create(): array /*array<CarModel>*/
    {
        $res = array();

        $c1 = new CarModel();
        $c1->name = 'R2';
        $c1->brand = 'Ravon';
        $res[] = $c1;

        $c2 = new CarModel();
        $c2->name = 'Rav4';
        $c2->brand = 'Toyota';
        $res[] = $c2;

        return $res;
    }

}