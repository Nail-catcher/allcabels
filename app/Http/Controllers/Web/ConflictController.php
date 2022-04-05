<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Conflict;
use App\Models\Fabric;
use App\Models\Guide;
use App\Models\Point;
use Illuminate\Http\Request;

class ConflictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countConflicts = Conflict::all()->count();
        $conflicts = Conflict::where('fabric_id',$request->fabric)->orderBy('id','DESC')->paginate(15);
        $fabric = Fabric::where('id',$request->fabric)->first();
        return view('pages/exclusion', ['conflicts'=>$conflicts,'count'=>$countConflicts,'fabric'=>$fabric]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $guides = Guide::where('fabric_id',$request->fabric)->orderBy('id','DESC')->paginate(15);
        $fabric = Fabric::where('id',$request->fabric)->first();
        if($request->index){
            $selectPoint = Point::whereId($request->index)->first();
            return view('pages/exclusionNewSec',['guides' => $guides, 'fabric' => $fabric, 'selectPoint'=>$selectPoint]);

        } else {
            return view('pages/exclusionNew', ['guides' => $guides, 'fabric' => $fabric]);
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
        $fabric = Fabric::where('id',$request->fabric)->first();
        $guide = Guide::whereId($request->guide)->first();
        if($request->index){
            $selectPoint = Point::whereId($request->index)->first();
//            dd( $selectPoint);
            return view('pages/exclusionSec', ['points'=>$points,'fabric'=>$fabric,'guide'=>$guide, 'selectPoint'=>$selectPoint]);

        } else{
        return view('pages/exclusionIndex', ['points'=>$points,'fabric'=>$fabric,'guide'=>$guide]);
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
