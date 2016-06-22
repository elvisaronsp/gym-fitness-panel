<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface ThumbUploadInterface
{
    public function upload($fileInputName, Request $request);
}
