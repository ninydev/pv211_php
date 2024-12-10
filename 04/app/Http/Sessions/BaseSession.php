<?php

namespace App\Http\Sessions;

class BaseSession
{
    private function __construct()
    {
        session_start();
        echo 'session started: ' . session_id();
    }

    /**
     * Отримати екземпляр классу
     * @return BaseSession
     */
    public static function getInstance(): BaseSession
    {
        if ( is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private static BaseSession $instance;

    public function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, mixed $default = null) : mixed
    {
        return $_SESSION[$key] ?? $default;
    }

}