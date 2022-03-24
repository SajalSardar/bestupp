<?php

namespace App\Http\Controllers\backend\education;

use Illuminate\Http\Request;
use App\Models\Teachereducation;
use App\Http\Controllers\Controller;

class TeacherEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Teachereducation::all();
        return view('backend.education.index', compact('datas'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $insert = new Teachereducation();
        $insert->name = $request->name;
        $insert->save();
        return back()->with('success', 'Education Add Successully Done!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teachereducation  $Teachereducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teachereducation $Teachereducation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachereducation  $Teachereducation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachereducation $Teachereducation)
    {
        //
    }
}
