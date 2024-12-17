<?php

use App\Config\AppConfig;

require_once '../vendor/autoload.php';


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
$sql = "SELECT * FROM cars";

// 3 Send SQL Query to server

if ($result = $mysqli->query($sql)) {
    // 4. Catch Response
    echo "Query executed successfully\n";

    $cars = [];

    // Обработка результата
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . "\n";
        $car = new \App\Models\CarModel();
        $car->id = $row['id'];
        $car->name = $row['name'];
        $car->brand = $row['brand'];

        $cars[] = $car;
    }

    // Освобождаем память
    $result->free();
} else {
    // 4. Catch Error
    echo "Error executing query: " . $mysqli->error . "\n";
}


// 5 Disconnect from Server
$mysqli->close();


