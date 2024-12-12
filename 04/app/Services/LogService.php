<?php

namespace App\Services;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class LogService
{
    private Logger $logger;

    public function __construct(
        string $logChannel = 'default',
                                string $logFile = 'app.log')
    {
        $this->logger = new Logger($logChannel);

        // Добавляем обработчики
        $this->logger->pushHandler(new
        StreamHandler(__DIR__ . "/../../logs/{$logFile}", Logger::DEBUG));
        $this->logger->pushHandler(new FirePHPHandler());
    }

    public function info(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    public function error(string $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    public function debug(string $message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }

    public function critical(string $message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }
}
