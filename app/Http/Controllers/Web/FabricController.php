<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FabricStore;
use App\Http\Resources\FabricsResource;
use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    public function index()
    {
        $countFab = Fabric::all()->count();
        $fabrics = Fabric::orderBy('id','DESC')->paginate(15);

        return view('pages/fabric', ['fabrics'=>$fabrics,'count'=>$countFab]);
    }
}
