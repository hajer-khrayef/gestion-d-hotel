<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receptionniste extends Model
{
    use HasFactory;
    protected $fillable=[
        'idfacture',
        'idclient',
        'idbooking',
        'idroom',
        'tarifs',
       

    ];
}
