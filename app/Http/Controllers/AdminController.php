<?php

namespace App\Http\Controllers;
use App\Models\admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return admin::all();
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'idadmin'=>'required',
        'nomadmin'=>'required',
        'idhotel'=>'required',
        'nomhotel'=>'required',
       
        ]);
    
        return admin::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return admin::find($id);
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
        $admin = admin::find($id);
        $admin->update($request->all());
        return $admin;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return admin::destroy($id);
    }
      /**
     *search for a name.
     *
     * @param  str  $nom
     * @return \Illuminate\Http\Response
     */
    public function search($nomadmin)
    {
        return admin::where('nomadmin','like','%'.$nomadmin.'%')->get();
    }
   
}
