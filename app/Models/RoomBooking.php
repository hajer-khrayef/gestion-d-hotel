<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name','Start_date' , 'Cost_per_day', 'Status','End_date'
    ];
}
