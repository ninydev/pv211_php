<?php

namespace App\Config;

use Symfony\Component\Dotenv\Dotenv;

class AppConfig
{
    private static array $config = [];
    private static bool $isLoaded = false;

    /**
     * Инициализировать загрузку конфигурации
     *
     * @param string $envFile Путь к файлу .env
     * @return void
     */
    public static function load(string $envFile = '.env'): void
    {
        if (self::$isLoaded) {
            return; // Конфигурация уже загружена
        }

        $dotenv = new Dotenv();
        $dotenv->loadEnv(__DIR__ . '/../../' . $envFile);

        // Сохраняем переменные окружения в статическом массиве
        self::$config = $_ENV;
        self::$isLoaded = true;
    }

    /**
     * Получить значение переменной конфигурации
     *
     * @param string $key Ключ конфигурации
     * @param mixed $default Значение по умолчанию, если ключ не найден
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        self::load();
        return self::$config[$key] ?? $default;
    }

    /**
     * Получить все конфигурации
     *
     * @return array
     */
    public static function getAll(): array
    {
        self::load();
        return self::$config;
    }
}

