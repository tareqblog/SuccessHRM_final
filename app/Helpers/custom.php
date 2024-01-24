<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FileHelper
{
    public static function uploadFile($file, $folder_name = null, $disk = 'public', $path = 'uploads')
    {
        $path = $path.'/'.$folder_name;
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs($path, $filename, $disk);
        return $filePath;
    }

    public static function modify_name($modify_id) {
        return User::find($modify_id)->name;
    }
    public static function usr() {
        return Auth::guard('web')->user();
    }
}
