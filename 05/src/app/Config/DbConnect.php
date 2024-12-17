<?php
use App\Config\AppConfig;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => AppConfig::get('DB_HOST'),
    'database'  => AppConfig::get('DB_DBNAME'),
    'username'  => AppConfig::get('DB_USER'),
    'password'  => AppConfig::get('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
