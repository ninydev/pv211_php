<?php

namespace App\Facades;

use App\Enums\StorageTypeEnum;
use App\Services\AzureBlobStorageService;
use App\Services\AzureStorageService;
use App\Services\Interfaces\StorageServiceInterface;
use App\Services\LocalStorageService;

class Storage
{
    private static ?LocalStorageService $localStorageService = null;
    private static ?AzureStorageService $azureStorageService = null;
    private static ?StorageServiceInterface $defaultStorage = null;

    // Инициализация локального хранилища
    private static function initLocalStorage(): void
    {
        if (self::$localStorageService === null) {
            self::$localStorageService = new LocalStorageService();
        }
    }

    // Инициализация Azure Blob Storage
    private static function initAzureStorage(): void
    {
        if (self::$azureStorageService === null) {
            self::$azureStorageService = new AzureStorageService();
        }
    }



    public static function disk(StorageTypeEnum $type)
    {
        switch ($type) {
            case StorageTypeEnum::Local:
                self::initLocalStorage();
                return self::$localStorageService;
                break;
            case StorageTypeEnum::Azure:
                self::initAzureStorage();
                return self::$azureStorageService;
                break;
        }
    }


    // Загрузка файла в хранилище по умолчанию
    public static function upload($bucket, $file, $path = null, $fileName = null): bool
    {
        if (self::$defaultStorage === null) {
            self::initLocalStorage();
            self::$defaultStorage = self::$localStorageService;
        }

        return self::$defaultStorage->upload($bucket, $file, $path, $fileName);
    }
}
