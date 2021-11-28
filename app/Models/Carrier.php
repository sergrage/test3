<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Price;


class Carrier extends Model
{
    use HasFactory;

     protected $fillable = ['name'];
//    protected $with = ['prices'];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
