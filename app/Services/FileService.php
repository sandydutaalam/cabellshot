<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService
{
    public function uploadFile($file)
    {
        $fileName = Str::random(60) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('services', $fileName, 'public');
        return 'storage/' . $path;
    }

    public function removeFile($path, $visibility = 'public')
    {
        $path = str_replace('storage/', '', $path);

        if (Storage::disk($visibility)->exists($path)) {
            Storage::disk($visibility)->delete($path);
        }
    }

    public function replaceFile($file, $oldPath)
    {
        $this->removeFile($oldPath);
        return $this->uploadFile($file);
    }

}
