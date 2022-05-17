<?php

namespace App\Http\Controllers;

use App\Models\OtherGuides;
use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternOtherGuidesPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pattern = Pattern::whereId($request->pattern)->first();
//        dd($pattern);
        return view('pages/patternOtherGuides', ['pattern'=>$pattern]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $otherguides = OtherGuides::all();
        $pattern = Pattern::whereId($request->pattern)->first();
//        dd($pattern);
        return view('pages/patternOtherGuidesList', ['guides'=>$otherguides,'pattern'=>$pattern]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pattern = Pattern::whereId($request->pattern)->first();
        foreach ($request->points as $point){
            $pattern -> otherguidespoints() -> attach($point);
        }
        return 'succsess';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $otherguide = OtherGuides::whereId($request->guide)->first();
        $pattern = Pattern::whereId($request->pattern)->first();
        return view('pages/patternOtherGuidesNew', ['guide'=>$otherguide,'pattern'=>$pattern]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pattern = Pattern::whereId($request->pattern)->first();

            $pattern -> otherguidespoints() -> detach($request->point);

        return 'succsess';
    }
}
