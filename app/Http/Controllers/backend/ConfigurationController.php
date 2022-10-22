<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaySchedule;
use App\Models\TimeSchedule;

class ConfigurationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function DaySchedul(){
        $datas = DaySchedule::all();
        return view('backend.configaration.day', compact('datas'));
    }
    function DaySchedulStore(Request $request) {
        $this->validate($request,[
            'name' => "required|string"
        ]);

        $data = new DaySchedule();

        $data->name = $request->name;
        $data->save();
        return back()->with("success", "Day Schedule Added!");

    }

    function DaySchedulDelete($id){
        $id = DaySchedule::find($id);
        $id->delete();
        return back()->with("success", "Day Schedule Deleted!");

    }

}
