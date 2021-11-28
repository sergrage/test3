<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

     protected $fillable = ['price', 'interval', 'carrier_id'];


    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

}
