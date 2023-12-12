<?php

namespace App\Helpers;


class FileHelper
{
    public static function uploadFile($file, $disk = 'public', $path = 'uploads')
    {
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs($path, $filename, $disk);
        return $filePath;
    }
}
