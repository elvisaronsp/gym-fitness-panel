<?php

namespace App\Abstracts;

use App\Contracts\ThumbUploadInterface;
use Illuminate\Http\Request;
//use Illuminate\Support\Str;

abstract class ThumbManager implements ThumbUploadInterface
{
    protected $uploadPath = 'upload/';
    
    public function getUploadPath()
    {
        return $this->uploadPath;
    }
    
    public function upload($fileInputName, Request $request)
    {
        if ($request->hasFile($fileInputName) && $request->file($fileInputName)->isValid()) {
            $file = $request->file($fileInputName);
            $fileName = $file->getClientOriginalName();
            $file->move(public_path($this->uploadPath), $fileName);

            return $fileName;
        }
        
        return null;
    }
}
