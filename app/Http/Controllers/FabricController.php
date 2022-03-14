<?php

namespace App\Http\Controllers;

use App\Http\Requests\FabricStore;
use App\Http\Resources\FabricsResource;
use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): FabricsResource
    {
        $fabrics = Fabric::with([
            'products',
            'guides',
            'guides.points',
            'patterns'
        ]);

        return new FabricsResource($fabrics->paginate($data['limit'] ?? null));
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
    public function store(FabricStore $request)
    {
        $data = $request->validated();
        $fabric = new Fabric();
        $fabric->fill($data)->toJson();
        $fabric->save();
        return $fabric;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function show(Fabric $fabric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabric $fabric)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabric $fabric)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabric $fabric)
    {
        $fabric -> delete();
        return  'success';
    }
}
