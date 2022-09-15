<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ReturnPolicy;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $terms = TermsCondition::orderBy('id', 'asc')->get();
        return view('backend.terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $terms = new TermsCondition();
        $request->validate([
            "title"          => "required",
            "privacy_policy" => "required",
        ]);

        $terms->title          = $request->title;
        $terms->privacy_policy = $request->privacy_policy;
        $terms->save();
        return back()->with('success', "Terms And Condition Added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function show(TermsCondition $termscondition) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(TermsCondition $termscondition) {
        return view('backend.terms.edit', compact('termscondition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermsCondition $termscondition) {
        $request->validate([
            "title"          => "required",
            "privacy_policy" => "required",
        ]);

        $termscondition->title          = $request->title;
        $termscondition->privacy_policy = $request->privacy_policy;
        $termscondition->save();
        return redirect(route('dashboard.termscondition.index'))->with('success', "Terms Condition Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsCondition $termscondition) {
        $termscondition->delete();
        return back()->with('success', "Terms Condition Deleted!");
    }

    public function returnPolicy() {
        $returnPolicy = ReturnPolicy::first();
        return view('backend.return.edit', compact('returnPolicy'));
    }

    public function returnPolicyUpdate(Request $request, $id) {
        $request->validate([
            "title"          => "required",
            "privacy_policy" => "required",
        ]);
        $data                 = ReturnPolicy::find($id);
        $data->title          = $request->title;
        $data->privacy_policy = $request->privacy_policy;
        $data->save();
        return back()->with('success', "Update Return Policy Updated!");
    }
}
