<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Traits\Constants;
use Illuminate\Http\Request;

class BrandForFreeController extends Controller
{
    use Constants;

    public function index()
    {
        return view("web.brand4free.index");
    }

    public function get_started(Request $request)
    {

        if ($request->getMethod() == "GET") {
            return view("web.brand4free.get_started");
        }
        // dump($request->all());

        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "business_name" => "required|string",
            "business_address" => "required|string",
            "isRegistered" => "required|string",
            "about" => "required|string",
            "summary" => "required|string",
            "image" => "required|image",
        ]);

        if (!empty($image = $request->file("image"))) {
            $data["image"] = resizeImageandSave($image , $this->brandImagesPath , 'local' , 640 , 360);
        }

        $data["user_id"] = 1;
        Brand::create($data);
        return back()->with("application_success", "Application submitted successfully!");
    }


    // Admin side
}
