<?php
require_once '../vendor/autoload.php';
require_once '../app/Config/DbConnect.php';


use Illuminate\Support\Facades\DB;

//$res = DB::select('SELECT * from cars
//LEFT JOIN pv211.colors c on c.id = cars.color_id');
//
//var_dump($res);

use App\Models\CarModel;


$cars = CarModel::all();


echo "<ul>\n";
foreach ($cars as $car) {
    echo "<li>" . $car->id . " - " . $car->name . "</li>";
    echo "<strong>" . ($car->color ? $car->color->name : " ") .  " </strong>" ;
    // var_dump($car->getAttributes());
}
echo "</ul>\n";

$car = CarModel::find('0d5c1371-9407-4263-b488-90da42acd54c');

var_dump($car->getAttributes());
var_dump($car->color->getAttributes());

// var_dump($car->getAttributes());

// var_dump($cars);