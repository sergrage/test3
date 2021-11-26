<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Price;
use App\Models\PaymentInterval;

class Carrier extends Model
{
    use HasFactory;

     protected $fillable = ['name'];

     public function paymentInterval()
    {
        return $this->hasManyThrough(PaymentInterval::class, Price::class);
    }


    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
