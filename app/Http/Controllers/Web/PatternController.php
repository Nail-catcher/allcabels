<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Fabric;
use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index(Request $request)
    {
        $countPatterns = Pattern::all()->count();
        $patterns = Pattern::where('fabric_id',$request->fabric)->orderBy('id','DESC')->paginate(15);
        $fabric = Fabric::where('id',$request->fabric)->first();
        return view('pages/pattern', ['patterns'=>$patterns,'count'=>$countPatterns,'fabric'=>$fabric]);
    }
    public function create(Request $request)
    {
       $fabric = Fabric::where('id',$request->fabric)->first();

        return view('pages/patternNew', ['fabric'=>$fabric]);
    }
    public function destroy(Pattern $pattern)
    {
        $pattern -> delete();
        return  redirect()->back();
    }
}
