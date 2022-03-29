<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuideStore;
use App\Http\Resources\GuideResource;
use App\Http\Resources\GuidesResource;
use App\Models\Guide;
use App\Models\Point;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): GuidesResource
    {
        $guides = Guide::where('name', 'like', $request->name.'%')->with([]);

        return new GuidesResource($guides->paginate($data['limit'] ?? null));
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
    public function store(GuideStore $request)
    {
        $data = $request->validated();
        $guide = new Guide();
        $guide->fill($data)->toJson();
        $guide->fabric()->associate($data['fabric']);
        $guide->save();

        return $guide;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide): GuideResource
    {
        $guide ->load([
            'points'
        ]);

        return new GuideResource($guide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {


        $guide->delete();
        return  'success';
    }
}
