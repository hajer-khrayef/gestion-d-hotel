<?php

namespace App\Http\Controllers;
use App\Models\Cafe;

use Illuminate\Http\Request;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cafe::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'idproduit'=>'required',
        'nomproduit'=>'required',
        'dateproduit'=>'required',
        'prixunitaire'=>'required',
       
        ]);
    
        return Cafe::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idproduit)
    {
        return Cafe::find($idproduit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idproduit)
    {
        $cafe = Cafe::find($idproduit);
        $cafe->update($request->all());
        return $cafe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idproduit)
    {
        return Cafe::destroy($idproduit);
    }
      /**
     *search for a name.
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
    public function search($nomproduit)
    {
        return Cafe::where('nomproduit','like','%'.$nomproduit.'%')->get();
    }
}