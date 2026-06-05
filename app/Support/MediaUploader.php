<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaUploader
{
    public static function image(UploadedFile $file, string $folder, ?int $width = null, ?int $height = null): string
    {
        $sourcePath = $file->getRealPath();
        $mime = $file->getMimeType();

        if ($mime === 'image/png') {
            $src = imagecreatefrompng($sourcePath);
        } elseif ($mime === 'image/webp') {
            $src = imagecreatefromwebp($sourcePath);
        } else {
            $src = imagecreatefromjpeg($sourcePath);
        }

        $srcW = imagesx($src);
        $srcH = imagesy($src);

        if ($width && $height) {
            $dst = imagecreatetruecolor($width, $height);

            $srcRatio = $srcW / $srcH;
            $dstRatio = $width / $height;

            if ($srcRatio > $dstRatio) {
                $newH = $srcH;
                $newW = (int)($srcH * $dstRatio);
                $srcX = (int)(($srcW - $newW) / 2);
                $srcY = 0;
            } else {
                $newW = $srcW;
                $newH = (int)($srcW / $dstRatio);
                $srcX = 0;
                $srcY = (int)(($srcH - $newH) / 2);
            }

            imagecopyresampled($dst, $src, 0, 0, $srcX, $srcY, $width, $height, $newW, $newH);
        } elseif ($width) {
            $height = (int)($srcH * ($width / $srcW));
            $dst = imagecreatetruecolor($width, $height);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $srcW, $srcH);
        } else {
            $dst = $src;
        }

        ob_start();
        imagejpeg($dst, null, 85);
        $jpg = ob_get_clean();

        $filename = $folder.'/'.uniqid().'.jpg';
        Storage::disk('public')->put($filename, $jpg);

        imagedestroy($src);
        if ($dst !== $src) {
            imagedestroy($dst);
        }

        return $filename;
    }

    public static function file(UploadedFile $file, string $folder): string
    {
        return $file->store($folder, 'public');
    }
}
