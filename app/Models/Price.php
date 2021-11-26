<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

     protected $fillable = ['price', 'carrier_id'];


    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function paymentInterval()
    {
        return $this->hasOne(PaymentInterval::class);
    }
}
