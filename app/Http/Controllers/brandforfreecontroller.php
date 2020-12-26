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
            $data["image"] = resizeImageandSave($image, $this->brandImagesPath, 'local', 640, 360);
        }

        $data["user_id"] = 1;
        Brand::create($data);
        return back()->with("application_success", "Application submitted successfully!");
    }


    public function contestants()
    {
        $fromDate = carbon()->startOfMonth();
        $toDate = carbon()->endOfMonth();
        $month = date("F Y", strtotime($fromDate));
        $brands = Brand::where("status", $this->activeStatus)
            ->whereBetween("created_at", [$fromDate, $toDate])
            ->inRandomOrder()
            ->get();
        return view("web.brand4free.contestants", compact("month", "brands"));
    }

    public function vote(Request $request)
    {
        $id = $request->brand_id;
        $brand = Brand::findorfail($id);
        $cookieKey = $this->myVotedBrandsCookieKey;
        $oldcookie = $request->cookie($cookieKey);
        $votedBrands = !empty($oldcookie) ? unserialize($oldcookie) : [];
        if (!in_array($id, $votedBrands)) {
            // dd($oldcookie);
            array_push($votedBrands, $id);
            return back()->with("success_msg", "Vote submitted successfully!")->withCookie(cookie()->cook($cookieKey, serialize($votedBrands)));
        } else {
            // Voted before
            return back()->with("error_msg", "You already voted for this brand!");
        }
    }
}
