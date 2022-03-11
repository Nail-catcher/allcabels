<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatternStore;
use App\Http\Resources\PatternsResource;
use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():PatternsResource
    {
        $patterns = Pattern::with([]);

        return new PatternsResource($patterns->paginate($data['limit'] ?? null));
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
    public function store(PatternStore $request)
    {
        $data = $request->validated();
        $pattern = new Pattern();
        $pattern ->fill($data);
        $pattern->fabric()->associate($data['fabric']);

        $pattern->save();

        return $pattern;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function show(Pattern $pattern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function edit(Pattern $pattern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pattern $pattern)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pattern $pattern)
    {
        $pattern -> delete();
        return  'success';
    }

    public function patternPoints(Request $request, Pattern $pattern)
    {
        //dd($request->points);
        foreach ($request->points as $key => $value){
            if (isset($value['unique'])){
                $pattern->guides()->attach($value['id'], array('unique' => $value['unique'], 'index'=>$key));
           // var_dump($value['unique']);
            } else {
           //     var_dump($key);
                $pattern->constants()->attach($value['id'], array('index'=>$key));
            }
        }
    }
}
