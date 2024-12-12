<?php

namespace App\Services;

use App\Config\AppConfig;
use App\Facades\Log;
use App\Services\Interfaces\StorageServiceInterface;
use MicrosoftAzure\Storage\File\FileRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\File\Models\CreateFileOptions;

class AzureShareStorageService implements StorageServiceInterface
{
    private $fileClient;

    public function __construct()
    {
        $connectionString = AppConfig::get('AZURE_STORAGE_CONNECTION_STRING');
        $this->fileClient = FileRestProxy::createFileService($connectionString);
    }

    public function upload($bucket, $file, $path = null, $fileName = null)
    {
        try {
            // Проверяем наличие ошибок при загрузке файла
            if ($file['error'] !== UPLOAD_ERR_OK) {
                Log::error("Upload failed with error {$file['error']}");
                return false;
            }

            if (!$fileName) {
                $fileName = $file['name'];
            }

            // Определяем путь в хранилище
            $directoryPath = $path ? rtrim($path, '/') : '';

            // Проверяем наличие директории, если её нет - создаём
            if (!empty($directoryPath)) {
                $this->ensureDirectoryExists($bucket, $directoryPath);
            }

            // Загружаем файл в Azure File Storage
            $fileContent = fopen($file['tmp_name'], 'r');
            $filePath = $directoryPath ? $directoryPath . '/' . $fileName : $fileName;

            $res = $this->fileClient->createFileFromContent($bucket, $filePath, $fileContent);
            Log::info($res);

            fclose($fileContent);

            return true;
        } catch (ServiceException $e) {
            Log::error("Azure File Storage upload failed: " . $e->getMessage());
            return false;
        } catch (\Exception $e) {
            Log::error("Unexpected error during upload: " . $e->getMessage());
            return false;
        }
    }

    private function ensureDirectoryExists($shareName, $directoryPath)
    {
        $directories = explode('/', $directoryPath);
        $currentPath = '';

        foreach ($directories as $directory) {
            $currentPath .= $directory . '/';

            try {
                $this->fileClient->createDirectory($shareName, rtrim($currentPath, '/'));
            } catch (ServiceException $e) {
                if ($e->getCode() !== 409) { // 409 - Directory already exists
                    throw $e;
                }
            }
        }
    }
}

?>