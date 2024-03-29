<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalog;


class Product extends Model
{
    use HasFactory;


    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
