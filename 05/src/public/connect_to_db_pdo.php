<?php

use App\Config\AppConfig;

require_once '../vendor/autoload.php';

try {
    // 1. Подключение к базе данных (MariaDB) через PDO
    $dsn = "mysql:host=" . AppConfig::get('DB_HOST') . ";dbname=" . AppConfig::get('DB_DBNAME') . ";charset=utf8mb4";
    $pdo = new PDO($dsn, AppConfig::get('DB_USER'), AppConfig::get('DB_PASSWORD'));

    // Устанавливаем режим обработки ошибок для PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Подготовка данных
    $car = new \App\Models\CarModel();
    $car->name = "R2";
    $car->brand = "Ravon";

    // 3. Подготовка SQL-запроса с параметрами
    $sql = "INSERT INTO cars (name, brand) VALUES (:name, :brand)";
    $stmt = $pdo->prepare($sql);

    // Привязываем параметры
    $stmt->bindParam(':name', $car->name);
    $stmt->bindParam(':brand', $car->brand);

    // 4. Выполнение SQL-запроса
    $stmt->execute();

    echo "Данные успешно добавлены!";

} catch (PDOException $e) {
    // Обработка ошибок подключения или запроса
    die("Ошибка: " . $e->getMessage());
} finally {
    // 5. Закрытие соединения
    $pdo = null;
}
