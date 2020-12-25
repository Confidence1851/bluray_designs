<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
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
        $builder = Brand::orderby("id", "desc");
        if(!empty($keyword)){
            $builder = $builder->where("name" , "like" , "%$keyword%")
                ->orWhere("business_name" , "like" , "%$keyword%")
                ->orWhere("email" , "like" , "%$keyword%");
        }
        $brands = $builder->whereBetween("created_at" , [$fromDate , $toDate])->paginate(10);
        $fromDate = date("Y-m-d" , strtotime($fromDate));
        $toDate = date("Y-m-d" , strtotime($toDate));
        return view("admin.brands.index", compact("brands" , "keyword", "fromDate" , "toDate"));
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
            "reward" => "nullable|string",
            "status" => "nullable|string",
            "message" => "nullable|string",
        ]);

        if (!empty($msg = $data["message"] ?? null)) {
            // Send messae
            dd($msg);
        }

        $brand = Brand::findorfail($id);

        if (!is_null($val = $data["reward"] ?? null)) {
            $brand->update(["reward" => $val]);
        }

        if (!empty($val = $data["status"] ?? null)) {
            $brand->update(["status" => $val]);
        }
        return back()->with('msg', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::findorfail($id)->delete();
        return back()->with('msg', 'Brand deleted successfully');
    }
}
