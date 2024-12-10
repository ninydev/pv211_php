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


}