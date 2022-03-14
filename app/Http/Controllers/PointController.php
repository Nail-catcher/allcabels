<?php

namespace App\Http\Controllers;

use App\Http\Resources\PointsResource;
use App\Models\Point;
use Illuminate\Http\Request;

use App\Http\Requests\PointStore;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request):PointsResource
    {
//        $points = Point::where('guide',$request->guide)->with([]);
//        return new PointsResource($points->paginate($data['limit'] ?? null));
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
    public function store(PointStore $request)
    {
        $data = $request->validated();
        $point = new Point();
        $point->fill($data)->toJson();
        $point->guide()->associate($data['guide']);
        $point->save();
        return $point;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        $point -> delete();
        return  'success';
    }
}
