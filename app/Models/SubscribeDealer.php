<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeDealer extends Model
{
    use HasFactory;
    protected $fillable=['category',
      'seller_person_id',
      'package',
      'budget',
      'dealerId'
    ];
}
