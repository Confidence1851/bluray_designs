<?php

namespace App\Http\Controllers\Admin;

use App\AppSetting;
use App\Brand;
use App\BrandRewardDesign;
use App\Http\Controllers\Controller;
use App\Mail\AppMail;
use App\Traits\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BrandsController extends Controller
{
    use Constants;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $keyword = $request->keyword ?? '';
        $fromDate = $request->fromDate ?? carbon()->startOfMonth();
        $toDate = $request->toDate ?? carbon()->endOfMonth();
        $builder = Brand::orderby('id', 'desc');
        if (!empty($keyword)) {
            $builder = $builder->where('name', 'like', "%$keyword%")
                ->orWhere('business_name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%");
        }
        $brands = $builder->whereBetween('created_at', [$fromDate, $toDate])->paginate(10);
        $fromDate = date('Y-m-d', strtotime($fromDate));
        $toDate = date('Y-m-d', strtotime($toDate));
        $settings = globalSettings();
        return view('admin.brands.index', compact('brands', 'keyword', 'fromDate', 'toDate', 'settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'reward' => 'nullable|string',
            'status' => 'nullable|string',
            'message' => 'nullable|string',
        ]);
        $brand = Brand::findorfail($id);
        $msg = $data['message'] ?? null;

        $mail = [
            'title' => '',
            'subject' => '',
            'name' => '',
            'message' => ''
        ];

        if (!is_null($val = $data['reward'] ?? null)) {
            if (empty($msg)) {
                $msg = 'After emerging as the top 2 on '. date("F, Y" , strtotime(now())).'`s Brand4Free contest, 
                you are now eligible to receive free design and print from us. 
                <br> 
                Kindly click on the link below to make your preferred selection.
                <br>
                <a href=' . route('brand_4_free.design_option', $brand->id) . '>Click here.</a>';
            }
            if (in_array($val, [1, 2])) {
                $mail = [
                    'title' => 'Your brand won ' . $brand->getReward() . ' in the BRAND 4 FREE contest!',
                    'subject' => "Cheers to success, $brand->business_name!",
                    'name' => $brand->name,
                    'message' => $msg
                ];
                Mail::to($brand->email)->send(new AppMail($mail));
            }

            $brand->update(['reward' => $val]);
        }

        if (!empty($val = $data['status'] ?? null)) {
            if (empty($msg)) {
                $msg = $val == 1 ?
                    'Invite your friends and family to visit the contestant list and vote for you!. 
                <a href=' . route('brand_4_free.contestants') . '>Click here to view contestants</a>' :
                    'After thorough review, we concluded that your brand does not qualify at this time! 
                Please try again after reading the rules guiding this programme.';
            }
            $mail = [
                'title' => $val == 1 ? 'Your brand has been shortlisted to participate in the BRAND 4 FREE contest!' : '',
                'subject' => $val == 1 ? 'Congrat, you have been shorlisted' : 'BRAND 4 FREE Application Updates',
                'name' => $brand->name,
                'message' => $msg
            ];
            // dd( $mail );
            $brand->update(['status' => $val]);
            Mail::to($brand->email)->send(new AppMail($mail));
        }
        return back()->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Brand $brand)
    {
        Brand::deleteWithImage($brand);
        return back()->with('success', 'Brand deleted successfully');
    }

    public function settings(Request $request)
    {
        $data = $request->validate([
            'brands_intiative_status' => 'required|string',
            'vote_starts' => 'nullable|string',
            'vote_ends' => 'nullable|string',
            'n_vote_starts' => 'nullable|string',
            'n_vote_ends' => 'nullable|string',
        ]);

        if ($data['brands_intiative_status'] != $this->activeStatus) {
            $data['vote_starts'] = null;
            $data['vote_ends'] = null;
            $data['n_vote_starts'] = null;
            $data['n_vote_ends'] = null;
        }

        if ($data['vote_starts'] > $data['vote_ends']) {
            return back()->with('error', 'Start date cannot be greater than end date!');
        }

        globalSettings()->update($data);
        return back()->with('success', 'Brand settings successfully');
    }

    public function downloadDesign(Request $request)
    {
        $id = $request->id;
        $brandReward = BrandRewardDesign::findorfail($id);
        $path = $brandReward->getDesignPath();
        return downloadFileFromPrivateStorage($path, optional($brandReward->brand)->business_name);
    }

    public function designComplete(Request $request)
    {
        $id = $request->id;
        BrandRewardDesign::findorfail($id)->update(['status' => $this->activeStatus]);
        return back()->with('success', 'Brand reward design updated successfully');
    }
}
