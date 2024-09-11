<?php

namespace App\Traits;

trait  ImageUploadTrait
{
    protected $imagePath = "app/public/images/covers";
    protected $imgHeight = 600;
    protected $imgWidth = 600;
    public function uploadImage($image)
    {
        $imgName = $this->imageName($image);


        \Intervention\Image\ImageManager::gd()->read($image)->resize($this->imgWidth, $this->imgHeight)->save(storage_path($this->imagePath . '/' . $imgName));
        return "images/covers/" . $imgName;
    }

    public function imageName($image)
    {
        return time() . '-' . $image->getClientOriginalName();
    }
}
