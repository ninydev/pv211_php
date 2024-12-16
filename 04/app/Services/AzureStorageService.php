<?php

namespace App\Services;

use app\Config\AppConfig;
use App\Facades\Log;
use App\Services\Interfaces\StorageServiceInterface;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

class AzureStorageService implements StorageServiceInterface
{
    private $blobClient;

    public function __construct()
    {
        $connectionString = AppConfig::get('AZURE_STORAGE_CONNECTION_STRING');
        $this->blobClient = BlobRestProxy::createBlobService($connectionString);
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

            // Убедимся, что контейнер существует
            $this->ensureContainerExists($bucket);

            // Определяем путь в хранилище
            $blobName = $path ? rtrim($path, '/') . '/' . $fileName : $fileName;

            // Загружаем файл в Azure Blob Storage
            $fileContent = fopen($file['tmp_name'], 'r');

            $this->blobClient->createBlockBlob($bucket, $blobName, $fileContent);


            return true;
        } catch (ServiceException $e) {
            Log::error("Azure Blob Storage upload failed: " . $e->getMessage());
            return false;
        } catch (\Exception $e) {
            Log::error("Unexpected error during upload: " . $e->getMessage());
            return false;
        }
    }

    private function ensureContainerExists($containerName)
    {
        try {
            // Проверяем, существует ли контейнер, и создаём его, если нет
            $this->blobClient->createContainer($containerName);
        } catch (ServiceException $e) {
            if ($e->getCode() !== 409) { // 409 - Container already exists
                throw $e;
            }
        }
    }
}

?>
