<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function uploadImage(Request $request,$path, $imageName = "img")
    {
        $imageFolder = public_path('admin/image/'.$path);
        if (file_exists($imageFolder.'/' . $request[$imageName])) {
            $fileName = $request[$imageName];
            return $fileName;
        } else {
            $file = $request->file($imageName);
            if (!$file)
                return "";
            if (!in_array($file->getClientOriginalExtension(), ['jpg', 'png', 'jpeg']))
                return "";
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($imageFolder, $fileName);
            return "admin/image/".$path."/".$fileName;
        }
    }
}
