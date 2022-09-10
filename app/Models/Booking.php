<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{  //use Notifiable;
    use HasFactory;
    //use SoftDeletes;
    protected $fillable = [
        'title','start', 'end','allDay'
    ];


public function category(){
    return $this->belongsTo(Category::class);
    }
}