<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MediaUploader
{
    public static function image(UploadedFile $file, string $folder, ?int $width = null, ?int $height = null): string
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath());

        if ($width && $height) {
            $image->cover($width, $height);
        } elseif ($width) {
            $image->scale(width: $width);
        }

        $filename = $folder.'/'.uniqid().'.jpg';

        Storage::disk('public')->put(
            $filename,
            (string) $image->toJpeg(85)
        );

        return $filename;
    }

    public static function file(UploadedFile $file, string $folder): string
    {
        return $file->store($folder, 'public');
    }
}
