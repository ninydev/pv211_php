<?php


use Exception;

/**
 * Все веб контроллеры возвращают данные в формате html
 * то-есть построенные страницы
 */
abstract class BaseWebController
{

    protected string $templateName = 'default';

    public function view(array $data = null) : string | null {

        // Начинаем буферизацию вывода
        ob_start();
        try {
            // Подключаем файл шаблона
            include __DIR__ . '/../../../views/layout/main.tpl.php';
            // Возвращаем содержимое буфера
            return ob_get_clean();
        } catch (Exception $e) {
            // Очищаем буфер в случае ошибки
            ob_end_clean();
            return null;
        }
    }

}