<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societé extends Model
{
    use HasFactory;
    protected $fillable=[
        'idsociete',
        'nomsociete',
        'emailsociete',
        'numsociete',
        'faxsociete',
        'addressesociete',       

    ];
}
