<?php

use App\Config\AppConfig;

require_once '../vendor/autoload.php';

$car = new \App\Models\CarModel();
$car->name = "R2";
$car->brand = "Ravon";

//echo "<pre>";
//var_dump($car);
//echo "</pre>";

//// 1 Connect to DB (MariaDB)
$mysqli = new mysqli(
    AppConfig::get('DB_HOST'),
    AppConfig::get('DB_USER'),
    AppConfig::get('DB_PASSWORD'),
    AppConfig::get('DB_DBNAME'));

// Проверяем соединение
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// 2 Build SQL Query
$sql = "INSERT INTO 
    cars (id, name, brand) 
VALUES 
    ('$car->id', '$car->name', '$car->brand')";

$sql = "INSERT INTO 
        `cars` (`id`, `name`, `brand`) 
    VALUES 
        ('$car->id', '$car->name', '$car->brand')";


// 3 Send SQL Query to server
$mysqli->query($sql);

// 4 Catch Response (or error)
if ($mysqli->connect_error) {
    die("Insert failed: " . $mysqli->connect_error);
}

// 5 Disconnect from Server
$mysqli->close();


