<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable=[
        'FactureNumber',
        'UserName',
       /*  'customer_id',
        'status',  */ 
        'RoomNumber',
        'RoomPrice',
        'CompanyName',
        'FacilitiesName_Prixunitaire',
        'FoodName_Prixunitaire_Quantite',
        'Prixtotal',
        'Check_in',
        'Check_out',
      
            

    ];
}
