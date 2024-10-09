<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandaardProduct extends Model
{
    use HasFactory;
    protected $table = 'standaard_producten';
    protected $fillable = ['naam', 'afbeelding', 'standaardprijs', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'categorie_id')->withDefault();
    }

    public function producten()
    {
        return $this->hasMany(Product::class);
    }
}
