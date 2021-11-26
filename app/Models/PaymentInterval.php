<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInterval extends Model
{
    use HasFactory;

     protected $fillable = ['interval', 'price_id'];
}
