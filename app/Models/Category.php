<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    protected $fillable = [
        'typeroom', 'description', 'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }


}