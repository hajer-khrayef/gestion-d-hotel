<?php

namespace App\Http\Controllers;
use App\Models\Hotels;
use Illuminate\Http\Request;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Hotels::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'nom'=>'required',
        'addresse'=>'required',
        'classe'=>'required',
        'téléphone'=>'required',
        'email'=>'required',
        'fax'=>'required',
        'caractéristique'=>'required',
        ]);
    
        return Hotels::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Hotels::find($id);
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
        $hotel = Hotels::find($id);
        $hotel->update($request->all());
        return $hotel;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Hotels::destroy($id);
    }
      /**
     *search for a name.
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
    public function search($nom)
    {
        return Hotels::where('nom','like','%'.$nom.'%')->get();
    }
}
