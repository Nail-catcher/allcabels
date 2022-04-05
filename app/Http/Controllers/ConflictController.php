<?php

namespace App\Http\Controllers;


use App\Http\Requests\ConflictStore;
use App\Models\Conflict;
use App\Models\Pattern;
use App\Models\Point;
use Illuminate\Http\Request;

class ConflictController extends Controller
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
        $data = $request;
//        dd($data);

        foreach ($data->secondPoints as $sp){
        $conflict = new Conflict();
        $conflict->firstPoint()->associate($data->firstPoint);
        $conflict->secondPoint()->associate($sp);
            if($data->pattern) {
                $pattern=Pattern::whereId($data->pattern)->first();
                $conflict->pattern()->associate($pattern->id);

                $conflict->fabric()->associate($pattern->fabric);
            } else {
        $conflict->fabric()->associate($data->fabric);
            }
        $conflict->save();


        }
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function show(Conflict $conflict)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function edit(Conflict $conflict)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conflict $conflict)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conflict $conflict)
    {
        $conflict->delete();

        return  'success';
    }
}
