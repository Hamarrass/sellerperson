<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function transporteur(){
        return $this->hasMany(Transporteur::class,'country_id','id');
    }

    public function city(){
        return $this->hasMany(City::class);
    }
}
