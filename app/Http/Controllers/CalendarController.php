<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;


class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Calendar::all();
    //  $events = array();
    //  $bookings = Booking::all();
    //  foreach($bookings as $booking){
    //     $event[] = [
    //     'title' => $booking->title,
    //       'start' => $booking->start,
    //         'end' => $booking->end,
    //           'allDay' => $booking->allDay,

    //     ];

    //  }
    
     
    //     return view('Calendar.vue', ['event' => $event]);
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
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'allDay' => 'required',
            
        ]);

        return Calendar::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Calendar::find($id);
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
        $calendar = Calendar::find($id);
        $calendar->update($request->all());
        return $calendar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Calendar::destroy($id);
    }
    public function search($start)
    {
        return Calendar::where('start', 'like', '%' . $start . '%')->get();
    }
}

