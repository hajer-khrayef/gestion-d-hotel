<?php

namespace App\Http\Controllers;
use App\Models\Societe;

use Illuminate\Http\Request;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return Societé::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'idsociete'=>'required',
        'nomsociete'=>'required',
        'emailsociete'=>'required',
        'numsociete'=>'required',
        'faxsociete'=>'required',
        'addressesociete'=>'required', 
       
        ]);
    
        return Societé::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idsociete)
    {
        return Societé::find($idsociete);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idsociete)
    {
        $societe = Societé::find($idsociete);
        $societe->update($request->all());
        return $societe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idsociete)
    {
        return Societé::destroy($idsociete);
    }
      /**
     *search for a name.
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
    public function search($nomsociete)
    {
        return Societé::where('nomsociete','like','%'.$nomsociete.'%')->get();
    }
}
