<?php

namespace App\Facades;

use app\Config\AppConfig;
use App\Services\LogService;

class Log
{
    private static ?LogService $service = null;

    private static function getService(): LogService
    {
        if (self::$service === null) {
            self::$service =
                new LogService(
                    AppConfig::get('LOG_LEVEL','default'),
                    AppConfig::get('LOG_FILE','app.log')
                    );
        }
        return self::$service;
    }

    public static function info(string $message, array $context = []): void
    {
        self::getService()->info($message, $context);
    }

    public static function error(string $message, array $context = []): void
    {
        self::getService()->error($message, $context);
    }

    public static function debug(string $message, array $context = []): void
    {
        self::getService()->debug($message, $context);
    }

    public static function critical(string $message, array $context = []): void
    {
        self::getService()->critical($message, $context);
    }
}