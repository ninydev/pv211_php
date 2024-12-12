<?php

namespace App\Services;

use App\Config\AppConfig;
use App\Facades\Log;
use App\Services\Interfaces\StorageServiceInterface;

class LocalStorageService implements StorageServiceInterface
{

    public function upload( $bucket, $file,  $path = null, $fileName = null ) {

        // Проверяем наличие ошибок при загрузке файла
        if ($file['error'] !== UPLOAD_ERR_OK) {
            Log::error("Upload failed with error {$file['error']}");
            return false;
        }


        $p = AppConfig::get('LOCAL_STORAGE_DIR'). '/' . $bucket;
        if (!is_dir($p)) {
            mkdir($p, 0777, true);
        }

        if ($path) {
            $p = AppConfig::get('LOCAL_STORAGE_DIR') . '/' . $bucket . '/' . $path;
            if (!is_dir($p)) {
                mkdir($p, 0777, true);
            }
        }

        if (!$fileName) {
            $fileName = $file['name'];
        }

        // Перемещаем файл в указанное место
        $destination = rtrim($p, '/') . '/' . basename($fileName);
        return move_uploaded_file($file['tmp_name'], $destination);
    }

}