<?php

namespace App\Http\Controllers;
use App\Models\Rapport;

use Illuminate\Http\Request;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return Rapport::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'daterapport'=>'required',
        'description'=>'required',
       
        ]);
    
        return Rapport::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($daterapport)
    {
        return Rapport::find($daterapport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $daterapport)
    {
        $rapport = Rapport::find($daterapport);
        $rapport->update($request->all());
        return $rapport;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($daterapport)
    {
        return Rapport::destroy($daterapport);
    }
      /**
     *search for a name.
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
    /*public function search($nom)
    {
        return Hotels::where('nom','like','%'.$nom.'%')->get();
    }*/
}
