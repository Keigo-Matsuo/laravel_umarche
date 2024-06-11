<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage; 

class ImageService
{
    public static function upload($imageFile, $folderName) {
        $fileName = uniqId(rand(). '_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName . '.' . $extension;

        // リサイズなしの場合
        Storage::putFileAs('public/' . $folderName, $imageFile, $fileNameToStore);

        // リサイズありの場合
        // $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
        // Storage::put('public/'. $folderName . '/' . $fileNameToStore, $resizedImage);
        
        return $fileNameToStore;
    }
}