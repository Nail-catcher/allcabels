<?php

namespace App\Http\Controllers;

use App\Models\OtherGuidesPoints;
use Illuminate\Http\Request;

class OtherGuidesPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $point = new OtherGuidesPoints([
            'index'=>$request->index,
            'description'=>$request->description
        ]);
//        $point->fill($data)->toJson();
        $point->guide()->associate($request->guide);
        $point->save();
        return $point;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtherGuidesPoints  $otherGuidesPoints
     * @return \Illuminate\Http\Response
     */
    public function show(OtherGuidesPoints $otherGuidesPoints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtherGuidesPoints  $otherGuidesPoints
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherGuidesPoints $otherGuidesPoints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtherGuidesPoints  $otherGuidesPoints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $otherGuidesPoints = OtherGuidesPoints::whereId($request->point)->first();
        $otherGuidesPoints->index=isset($request->index) ? $request->index : $otherGuidesPoints->index;
        $otherGuidesPoints->description=isset($request->description) ? $request->description : $otherGuidesPoints->description;
        $otherGuidesPoints->save();
        return $otherGuidesPoints;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtherGuidesPoints  $otherGuidesPoints
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $otherGuidesPoints = OtherGuidesPoints::whereId($request->point)->first();
        $otherGuidesPoints ->delete();
        return 'succsecc';
    }
}
