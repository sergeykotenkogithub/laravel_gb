<?php declare(strict_types=1);


namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
    /**
     * @param UploadedFile $file
     * @param string $path
     * @return string
     * @throws \Exception
     */
    public function upload(UploadedFile $file, $path = 'news'): string
    {
        $originalExtension = $file->getClientOriginalExtension(); // расширение файла
        $filename = uniqid('u_') . "." . "$originalExtension";

        if ($filePath = $file->storeAs($path, $filename, 'public')) {
            return $filePath;
        }

        throw new \Exception("File not uploaded");

    }
}
