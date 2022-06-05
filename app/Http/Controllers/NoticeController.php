<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;

class NoticeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $notices = Notice::orderBy('id', "DESC")->get();
        return view('backend.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'notice_type' => "required",
            'title'       => "required",
            'notice'      => 'required',
        ]);

        $data              = new Notice();
        $data->notice_type = $request->notice_type;
        $data->title       = $request->title;
        $data->notice      = $request->notice;
        $data->save();

        if ($data) {

            $students = User::role('student')->with('orders')->get();

            if ($request->notice_type == 'all') {

                foreach ($students as $student) {
                    $student->notices()->attach($data->id);
                }

            } elseif ($request->notice_type == 'admitted') {

                foreach ($students as $student) {

                    if (sizeof($student->orders)) {

                        $student->notices()->attach($data->id);
                    }
                }

            } elseif ($request->notice_type == 'none_admitted') {

                foreach ($students as $student) {
                    if (!sizeof($student->orders)) {
                        $student->notices()->attach($data->id);
                    }
                }
            }

            return redirect(route('dashboard.notice.index'))->with('success', "Notice Created Successfull!");
        } else {
            return back()->with('success', "Notice Not Created!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice) {
        return view('backend.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice) {
        $request->validate([
            'title'  => "required",
            'notice' => 'required',
        ]);

        $notice->title  = $request->title;
        $notice->notice = $request->notice;
        $notice->save();
        return redirect(route('dashboard.notice.index'))->with('success', "Notice Update Successfull!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice) {
        //
        $notice->delete();
        $notice->users()->detach();
        return back()->with('success', "Notice Deleted Successfull!");
    }

    function studentNotice() {
        return view('backend.notice.studentnotice');
    }

    function studentNoticeView(Notice $notice){
        $notice->status = 2;
        $notice->save();
        return view('backend.notice.studenview', compact('notice'));
    }

}
