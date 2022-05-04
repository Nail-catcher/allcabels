<?php

namespace App\Http\Controllers;

use App\Models\OtherGuides;
use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternOtherGuideController extends Controller
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
        return view('pages/patternOtherGuidesNew', ['otherguides'=>$otherguides,'pattern'=>$pattern]);
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
        foreach ($request->guides as $guide){
            $pattern -> otherguides() -> attach($guide);
        }
        return 'succsess';
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
