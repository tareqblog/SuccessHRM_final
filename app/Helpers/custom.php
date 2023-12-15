<?php

namespace App\Helpers;

use App\Models\User;

class FileHelper
{
    public static function uploadFile($file, $disk = 'public', $path = 'uploads')
    {
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs($path, $filename, $disk);
        return $filePath;
    }

    public static function modify_name($modify_id) {
        return User::find($modify_id)->name;
    }
}
