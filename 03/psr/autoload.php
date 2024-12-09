<?php
spl_autoload_register(function ($class_name) {
    echo 'Include Class: ' . $class_name . '<br>';
    require_once __DIR__ . '/app/' . $class_name . '.php';
});