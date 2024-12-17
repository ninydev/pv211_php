<?php
require_once '../vendor/autoload.php';

// Use the Medoo namespace.
use App\Config\AppConfig;
use Medoo\Medoo;

// Connect to the database.
$database = new Medoo([
    'type' => 'mysql',
    'host' => AppConfig::get('DB_HOST'),
    'database' => AppConfig::get('DB_DBNAME'),
    'username' => AppConfig::get('DB_USER'),
    'password' => AppConfig::get('DB_PASSWORD')
]);


$data = $database->select('cars', [
    'name',
    'brand'], []);

var_dump($data);