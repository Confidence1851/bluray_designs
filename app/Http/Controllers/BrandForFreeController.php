<?php

namespace App\Http\Controllers;

use App\Brand;
use App\BrandRewardDesign;
use App\Mail\AppMail;
use App\Traits\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $canApply = true;
            if(today()->format("d") >= 16){
                $canApply = false;
            }
            return view("web.brand4free.get_started" , ["canApply" => $canApply ]);
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
            $data["image"] = resizeImageandSave($image, $this->brandImagesPath, 'local', 1080, 920);
        }

        $data["user_id"] = auth()->id();
        $brand = Brand::create($data);
        $mail = [
            'title' => '',
            'subject' => "BRAND 4 FREE Application Received!",
            'name' => $brand->name,
            'message' => "Your application to participate in the BRAND 4 FREE contest has been received!' : '"
        ];
        Mail::to($brand->email)->send(new AppMail($mail));
        return back()->with("application_success", "Application submitted successfully!");
    }


    public function contestants()
    {
        $settings = globalSettings();
        $voteEndDate = !empty($date = $settings->vote_ends) ? date("l d F, Y", strtotime($date)) : "Inactive";

        if ($voteEndDate == "Inactive") {
            $voteStatus = "inactive";
        } elseif (carbon()->parse($voteEndDate)->isPast()) {
            $voteStatus = "ended";
        } else {
            $voteStatus = "active";
        }
        $nextVotingPeriods = !empty($settings->n_vote_starts) ?
                            date("d", strtotime($settings->n_vote_starts))." to ".date("d F, Y", strtotime($settings->n_vote_ends)) : "Coming soon!";
        $cookieKey = $this->myVotedBrandsCookieKey;
        $fromDate = carbon()->startOfMonth();
        $toDate = carbon()->endOfMonth();
        $month = date("F Y", strtotime($fromDate));
        $brands = Brand::where("status", $this->activeStatus)
            ->whereBetween("created_at", [$fromDate, $toDate])
            ->inRandomOrder()
            ->get();
        $topVoted = $brands->sortByDesc(["votes"])->take(2);
        $votedBrands =  session()->has($cookieKey) ? unserialize(session()->get($cookieKey)) : [];
        return view("web.brand4free.contestants", compact("month", "brands", "votedBrands", "topVoted", "voteEndDate" , "voteStatus" , "nextVotingPeriods"));
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

    public function designOption(Request $request)
    {
        $brand = Brand::findorfail($request->brand_id);
        if (in_array($brand->reward, [0])) {
            abort(403, "Access denied");
        }
        if ($request->getMethod() == "GET") {
            $rewardProducts = rewardProducts();
            return view("web.brand4free.design_option", compact("brand", "rewardProducts"));
        }

        $data = $request->validate([
            "brand_id" => "required|string|exists:brands,id",
            "selected_product" => "required|string",
            "full_name" => "required|string",
            "details" => "required|string",
            "design" => "nullable|mimes:pdf,jpg,cdr",
        ]);

        $check = BrandRewardDesign::where("brand_id", $data["brand_id"])->count();
        if ($check > 0) {
            return back()->with("error_msg", "A request has already been submitted for this brand!");
        }

        if (!empty($design = $request->file("design"))) {
            $data["design"] = putFileInPrivateStorage($design, $this->brandRewardDesignsPath);
        }
        BrandRewardDesign::create($data);
        return back()->with("success_msg", "Request submitted successfully!");
    }

    public function donate(Request $request)
    {
        if (auth()->check()) {
            $user_email = auth()->user()->email;
            $extra = "Donated from user account with email (<a href='mailto:$user_email'>$user_email</a>).";
        } else {
            $extra = 'Donated by guest.';
        }
        $mail = [
            "subject" => "New BRAND 4 FREE Donation",
            "message" => "<p> New donation of #" . number_format($request->amount, 2) . " has been received from <a href='mailto:$request->email'>$request->email</a> . <br> Payment reference: $request->reference. <br> $extra </p>"
        ];
        Mail::to(env("MAIL_FROM_ADDRESS"))->send(new AppMail($mail));
        return back()->with("success_msg", "Donation received successfully!");
    }
}
