<?php

namespace App\Http\Requests;

class BaseRequest
{

    /**
     * Отрімати змінную  з запросу, чи значення за замовченням
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function input(string $key, mixed $default = null) : mixed
    {
        return $_REQUEST[$key] ?? $default;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function file(string $key): mixed
    {
        return $_FILES[$key];
    }

    /**
     * Отримати тип HTTP-запиту
     * @return string
     */
    public function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN';
    }
}