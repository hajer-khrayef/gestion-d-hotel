<?php

namespace App\Http\Controllers;
use App\Models\EventBooking;
use Illuminate\Http\Request;

class EventBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventBooking::all();
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
            'Number_of_tickets'=>'required',
            'Total_cost'=>'required',
            'Payement'=>'required',
            'Status'=>'required',
            'Created'=>'required',
           
         
           
            ]);
        
            return EventBooking::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EventBooking::find($id);
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
        $eventbooking = EventBooking::find($id);
        $eventbooking->update($request->all());
        return $eventbooking;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return EventBooking::destroy($id);
    }
}
