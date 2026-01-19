<?php

namespace App\Services;

use CodeIgniter\HTTP\Files\UploadedFile;

class UploadService
{
    /**
     * Upload file dengan penamaan aman & folder terpisah
     */
    public function upload(
        UploadedFile $file,
        string $targetDir,
        string $prefix
    ): string {
        if (! $file->isValid()) {
            throw new \RuntimeException('File tidak valid');
        }

        $extension = $file->getClientExtension();
        $filename  = $prefix . '_' . uniqid() . '.' . $extension;

        $file->move(WRITEPATH . 'uploads/' . $targetDir, $filename);

        return $filename;
    }
}
