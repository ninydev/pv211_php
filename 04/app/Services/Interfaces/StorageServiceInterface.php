<?php

namespace App\Services\Interfaces;

interface StorageServiceInterface
{
    public function upload( $bucket, $file,  $path = null, $fileName = null );
}