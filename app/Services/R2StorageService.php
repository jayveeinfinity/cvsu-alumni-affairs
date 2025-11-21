<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class R2StorageService
{
    public function __construct()
    {
        $this->disk = Storage::disk('r2');
    }

    /**
     * Upload a file to R2
     *
     * @param string $path   Path inside the bucket (e.g., "folder/file.txt")
     * @param mixed  $file   File contents or UploadedFile instance
     * @param string $visibility 'public' or 'private'
     * @return bool
     */
    public function upload(string $path, $file, string $visibility = 'private'): bool
    {
        if ($file instanceof UploadedFile) {
            $file = fopen($file->getRealPath(), 'r');
        }

        return $this->disk->put($path, $file, $visibility);
    }

    /**
     * Get the URL of a file
     *
     * @param string $path
     * @return string|null
     */
    public function getUrl(string $path): ?string
    {
        if (!$this->disk->exists($path)) {
            return null;
        }

        return $this->disk->url($path);
    }

    /**
     * Delete a file
     *
     * @param string $path
     * @return bool
     */
    public function delete(string $path): bool
    {
        if ($this->disk->exists($path)) {
            return $this->disk->delete($path);
        }

        return false;
    }

    /**
     * List files in a folder
     *
     * @param string $directory
     * @return array
     */
    public function listFiles(string $directory = ''): array
    {
        return $this->disk->files($directory);
    }
}