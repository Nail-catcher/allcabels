<?php

namespace App\Http\Controllers;

use App\Models\OtherGuides;
use App\Models\OtherGuidesPoints;
use Illuminate\Http\Request;

class OtherGuidesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $og = OtherGuides::orderBy('id','DESC')->paginate(30);
        $count = OtherGuides::all()->count();
        return view('pages.otherguides.guide',['guides'=>$og, 'count'=>$count]);
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
        $og=new OtherGuides([
            'name'=>$request->name,
            "description"=>$request->description
        ]);
        $og->save();
        return $og;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtherGuides  $otherGuides
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $otherGuides ->with([
//            'points'
//        ]);
        $otherGuides = OtherGuides::whereId($id)->first();
//        dd($otherGuides);
        return view('pages.otherguides.guideNew',['guide'=>$otherGuides]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtherGuides  $otherGuides
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherGuides $otherGuides)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtherGuides  $otherGuides
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $otherGuides=OtherGuides::whereId($request->guide)->first();
        $otherGuides->name=isset($request->name) ? $request->name : $otherGuides->name;
        $otherGuides->description=isset($request->description) ? $request->description : $otherGuides->description;
        $otherGuides->save();
        return $otherGuides;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtherGuides  $otherGuides
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $otherGuides=OtherGuides::whereId($request->guide)->first();
        $otherGuides->delete();
        return 'success';
    }
}
