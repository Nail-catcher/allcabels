<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Conflict;
use App\Models\Fabric;
use App\Models\Guide;
use App\Models\Pattern;
use App\Models\Point;
use Illuminate\Http\Request;

class PatternConflictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countConflicts = Conflict::all()->count();
        $conflicts = Conflict::where('pattern_id',$request->pattern)->orderBy('id','DESC')->paginate(15);
        $pattern = Pattern::where('id',$request->pattern)->first();
        return view('pages/exclusionPattern', ['conflicts'=>$conflicts,'count'=>$countConflicts,'pattern'=>$pattern]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pattern = Pattern::whereId($request->pattern)->first();
//        $fabric = Fabric::where('id',$request->fabric)->first();
        if($request->index){
            $selectPoint = Point::whereId($request->index)->first();
            return view('pages/PatternExclusionNewSec',['pattern' => $pattern,  'selectPoint'=>$selectPoint]);

        } else {
            return view('pages/PatternExclusionNew', ['pattern' => $pattern]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
//        dd($request->index);
        $points = Point::where('guide_id',$request->guide)->orderBy('id','DESC')->paginate(15);
        $pattern = Pattern::whereId($request->pattern)->first();
        $guide = Guide::whereId($request->guide)->first();
        if($request->index){
            $selectPoint = Point::whereId($request->index)->first();
//            dd( $selectPoint);
            return view('pages/PatternExclusionSec', ['points'=>$points,'pattern' => $pattern,'guide'=>$guide,'selectPoint'=>$selectPoint]);

        } else{
            return view('pages/PatternExclusionIndex', ['points'=>$points,'guide'=>$guide,'pattern' => $pattern]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $points = Point::where('guide_id',$request->guide)->orderBy('id','DESC')->paginate(15);
        $fabric = Fabric::where('id',$request->fabric)->first();
        return view('pages/exclusionPattern', ['points'=>$points,'fabric'=>$fabric,'guide'=>$request->guide]);
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
