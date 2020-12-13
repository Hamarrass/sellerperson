<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function transporteur(){
        return  $this->hasMany(Transporteur::class,'city_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
