<?php

namespace App\Models;

use App\Models\AddSellerPerson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscribeDealer extends Model
{
    use HasFactory;
    protected $fillable=[
    'dateLancement',
    'dateVente',
    'dealerId',
    'newClient',
    'upsellerAd360',
    'oldPrice',
    'newPrice',
    'upgradePackage',
    'benifit',
    'seller_person_id'
    ];

    public function add_seller_person(){
        return $this->belongsTo(AddSellerPerson::class);
    }
}
