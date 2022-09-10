<?php

namespace App\Http\Controllers;

use App\Models\Client;   

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $request->validate([
        'cin'=>'required',
        'nom'=>'required',
        'prenom'=>'required',
        'email'=>'required',
        'nationalite'=>'required',
        'idsociete'=>'required',
    ]);
    return Client::create($request->all());
    }
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cin)
    {
        return Client::find($cin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cin)
    {
        $client = Client::find($cin);
        $client->update($request->all());
        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cin)
    {
        return Client::destroy($cin);
    }
      /**
     *search for a name.
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
    public function search($nom)
    {
        return Client::where('nom','like','%'.$nom.'%')->get();
    }
}
