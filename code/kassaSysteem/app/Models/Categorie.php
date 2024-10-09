<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['naam'];

    public function producten()
    {
        return $this->hasMany(Product::class);
    }

    public function standaard_producten()
    {
        return $this->hasMany(StandaardProduct::class);
    }


}
