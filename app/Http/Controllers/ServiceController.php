<?php

namespace App\Http\Controllers;
use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {return Service::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'idservice'=>'required',
        'nomservice'=>'required',
        'dateservice'=>'required',
        'prixservice'=>'required',
     
    
        ]);
    
        return Service::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idservice)
    {
        return Service::find($idservice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idservice)
    {
        $service = Service::find($idservice);
        $service->update($request->all());
        return $service;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idservice)
    {
        return Service::destroy($idservice);
    }
      /**
     *search for a name.
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
    public function search($nomservice)
    {
        return Service::where('nomservice','like','%'.$nomservice.'%')->get();
    }
}
