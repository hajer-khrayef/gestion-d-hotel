<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomBooking;

class RoomBookingController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomBooking::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'Name'=>'required',
        'Start_date'=>'required',
        'Cost_per_day'=>'required',
        'Status'=>'required',
        'End_date'=>'required',
        //'typeprix'=>'required',
        //'montantotal'=>'required',
        //'code'=>'required',
        
      
        ]);
    
        return RoomBooking::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RoomBooking::find($id);
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
        $roombooking = RoomBooking::find($id);
        $roombooking->update($request->all());
        return $roombooking;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return RoomBooking::destroy($id);
    }
      /**
     *search for a room.
     *
     * @param  str  $room
     * @return \Illuminate\Http\Response
     */
    public function search($Status)
    {
        return RoomBooking::where('Status','like','%'.$Status.'%')->get();
    }
}
