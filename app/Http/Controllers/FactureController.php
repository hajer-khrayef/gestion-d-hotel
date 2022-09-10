<?php

namespace App\Http\Controllers;
use App\Models\Facture;

use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Facture::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'FactureNumber'=>'required',
        'UserName'=>'required',
        'RoomNumber' => 'required',
        'RoomPrice' => 'required',
        'CompanyName' => 'required',
        'FacilitiesName_Prixunitaire' => 'required',
        'FoodName_Prixunitaire_Quantite' => 'required',
        'Prixtotal' => 'required', 
       /*  'customer_id'=>'required',
        'status'=>'required',    */
        'Check_in'=>'required',
        'Check_out'=>'required',
      
    
        ]);
    
        return Facture::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Facture::find($id);
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
        $facture = Facture::find($id);
        $facture->update($request->all());
        return $facture;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Facture::destroy($id);
    }
      /**
     *search for a name.
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
   /* public function search($nom)
    {
        return Hotels::where('nom','like','%'.$nom.'%')->get();
    }*/
}
