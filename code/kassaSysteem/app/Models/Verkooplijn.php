<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verkooplijn extends Model
{
    use HasFactory;

    protected $fillable = ['hoeveelheid', 'verkoopprijs', 'verkoop_id', 'product_id'];

    public function verkoop()
    {
        return $this->belongsTo(Verkoop::class, 'verkoop_id', 'verkoop_id')->withDefault();
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id')->withDefault();
    }
}
