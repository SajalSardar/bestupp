<?php

namespace App\Http\Controllers\Banner;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Banner::all();
        return view('backend.banner.index', compact('datas'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner_photo   = $request->file('banner_image');
        $this->validate($request,[
            'banner_title' => 'required',
            'banner_image' => 'mimes:jpeg,jpg,png|required|max:5120'
        ]);
        if ($banner_photo) {
            $_photo_name = Str::slug($request->banner_title).'.'. $banner_photo->getClientOriginalExtension();
            $photo_url   = URL::asset('storage/uploads/banner/' . $_photo_name);

            $photo_uploades = $banner_photo->move(public_path('storage/uploads/banner/'), $_photo_name); 

            if($photo_uploades){
                $data = new Banner();
                $data->banner_title = $request->banner_title;
                $data->banner_image = $photo_url;
                $data->save();
                return back()->with('success', "Successfully Uploaded Banner Image!");
            }
                
        }  
    
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
