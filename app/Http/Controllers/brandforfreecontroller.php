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
            $data["image"] = resizeImageandSave($image, $this->brandImagesPath, 'local', 1080, 1080);
        }

        $data["user_id"] = 1;
        Brand::create($data);
        return back()->with("application_success", "Application submitted successfully!");
    }


    public function contestants()
    {
        $cookieKey = $this->myVotedBrandsCookieKey;
        $fromDate = carbon()->startOfMonth();
        $toDate = carbon()->endOfMonth();
        $month = date("F Y", strtotime($fromDate));
        $brands = Brand::where("status", $this->activeStatus)
            ->whereBetween("created_at", [$fromDate, $toDate])
            ->inRandomOrder()
            ->get();
        $topVoted = $brands->sortBy(["votes" , "desc"])->take(2);
        $votedBrands =  session()->has($cookieKey) ? unserialize(session()->get($cookieKey)) : [];
        return view("web.brand4free.contestants", compact("month", "brands", "votedBrands" , "topVoted"));
    }

    public function vote(Request $request)
    {
        $id = $request->brand_id;
        $brand = Brand::findorfail($id);
        $cookieKey = $this->myVotedBrandsCookieKey;
        $votedBrands =  session()->has($cookieKey) ? unserialize(session()->get($cookieKey)) : [];
        if (!in_array($id, $votedBrands)) {
            config(['session.lifetime' => 100 * 100]);
            array_push($votedBrands, $id);
            session()->put($cookieKey, serialize($votedBrands));
            $brand->votes += 1;
            $brand->save();
            return back()->with("success_msg", "Vote submitted successfully!");
        } else {
            // Voted before
            return back()->with("error_msg", "You already voted for this brand!");
        }
    }
}
