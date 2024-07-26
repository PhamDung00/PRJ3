<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function uploadImage(Request $request, $path, $imageName = "img")
    {
        $imageFolder = public_path('admin/image/' . $path);
        if (file_exists($imageFolder . '/' . $request[$imageName])) {
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
            return "admin/image/" . $path . "/" . $fileName;
        }
    }
    public function revenue()
    {
        $time = $_GET["time"];
        switch ($time) {
            case "day":
                // day
                $sql = "select sum(total) as total from orders where created_at > now() - interval 1 day";
                break;
            case "week":
                $sql = "select sum(total) as total from orders where created_at > now() - interval 1 week";
                break;
            case "month":
                $sql = "select sum(total) as total from orders where created_at > now() - interval 1 month";
                break;
            case "year":
                $sql = "select sum(total) as total from orders where created_at > now() - interval 1 year";
                break;
            default:
                $sql = "select sum(total) as total from orders where created_at > now() - interval 1 month";
                break;
        }
        $sql .= " and status = 'success'";
        // get the revenue
        $revenue = DB::select($sql);
        return $revenue[0]->total ?? 0;
    }
}