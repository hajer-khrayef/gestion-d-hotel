<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saison;

class SaisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Saison::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomsaison'=>'required',
            'prixsaison'=>'required',
            'typeroom'=>'required',
            'typeprix'=>'required',
           
            
          
            ]);
        
            return Saison::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nomsaison)
    {
        return Saison::find($nomsaison);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nomsaison)
    {
        $saison = Saison::find($nomsaison);
        $saison->update($request->all());
        return $saison;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nomsaison)
    {
        return Saison::destroy($nomsaison);
    }
    /**
     *search for a saison.
     *
     * @param  str  $saison
     * @return \Illuminate\Http\Response
     */
    public function search($nomsaison)
    {
        return Saison::where('nomsaison','like','%'.$nomsaison.'%')->get();
    }
    public function Sum($typeroom , $prixsaison){
        $montant = Saison :: WithSum('typeroom', DB :: raw ('typeprix + table-> Saison.prixsaison')-> get ());
        echo $montant;
        }
        /*$total = DB::table('saisons')
        ->leftJoin('prixsaison','Saisons.typeprix','=','typeprix')
        ->where('saisons.id_user',Auth::user()->id)
        ->sum(DB::raw('prixsaison + typeprix');*/

}
