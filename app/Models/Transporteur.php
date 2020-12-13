<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporteur extends Model
{
    use HasFactory;
    protected $fillable=['country_id' ,'city_id','firstname' ,'lastname','phone','image'];

    public function country(){
           return $this->belongsTo(Country::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

}
