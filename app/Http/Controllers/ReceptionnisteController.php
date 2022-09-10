<?php

namespace App\Http\Controllers;
use App\Models\Receptionniste;

use Illuminate\Http\Request;

class ReceptionnisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {return receptionniste::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'idfacture'=>'required',
        'idclient'=>'required',
        'idbooking'=>'required',
        'idroom'=>'required',
        'tarifs'=>'required',
       
        ]);
    
        return receptionniste::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idroom)
    {
        return receptionniste::find($idroom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idroom)
    {
        $receptionniste = receptionniste::find($idrroom);
        $receptionniste->update($request->all());
        return $receptionniste;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idroom)
    {
        return receptionniste::destroy($idroom);
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
