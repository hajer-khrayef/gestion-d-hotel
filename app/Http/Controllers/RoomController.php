<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Room::all();
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
            'RoomNumber' => 'required',
            'RoomType' => 'required',
            'RoomPrice' => 'required',
            'Description' => 'required',
            'Available' => 'required',
            'RoomPhoto' => 'required',
            //'typeprix'=>'required',
            //'montantotal'=>'required',
            //'code'=>'required',
        
    


        ]);
           $data = $request->all();
          $response = Room::create($data);
          return response()->json([
            'status' => 'success',
             'data' => $response
            ], 200);

      //  return Room::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($RoomNumber)
    {
        return Room::find($RoomNumber);
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
        $room = Room::find($id);
        $room->update($request->all());
        return $room;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Room::destroy($id);
    }
    /**
     *search for a room.
     *
     * @param  str  $room
     * @return \Illuminate\Http\Response
     */
    public function search($Description)
    {
        return Room::where('Description', 'like', '%' . $Description . '%')->get();
    }
}
