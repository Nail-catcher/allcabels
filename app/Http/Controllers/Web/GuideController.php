<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Fabric;
use App\Models\Guide;
use App\Models\Point;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index(Request $request)
    {
        $countGuides = Guide::all()->count();
        $guides = Guide::where('fabric_id',$request->fabric)->orderBy('id','DESC')->paginate(15);
        $fabric = Fabric::where('id',$request->fabric)->first();
        return view('pages/guide', ['guides'=>$guides,'count'=>$countGuides,'fabric'=>$fabric]);
    }

    public function show(Request $request)
    {
//        $countGuides = Guide::all()->count();
//        $guides = Guide::where('fabric_id',$request->fabric)->orderBy('id','DESC')->paginate(15);
        $guide = Guide::where('id',$request->guide)->first();
        return view('pages/guideNew', ['guide' => $guide]);
    }
    public function destroy(Guide $guide)
    {
        $guide -> delete();
        return  redirect()->back();
    }
    public function point_destroy(Point $point)
    {
        $point -> delete();
        return  redirect()->back();
    }
}
