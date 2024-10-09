<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'producten';
    protected $guarded = ['product_id'];

    public function organisatie()
    {
        return $this->belongsTo(Organisatie::class, 'organisatie_id', 'organisatie_id')->withDefault();
    }

    public function verkooplijnen()
    {
        return $this->hasMany(Verkooplijn::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'categorie_id')->withDefault();
    }

    public function standaardProduct()
    {
        return $this->belongsTo(StandaardProduct::class, 'standaard_id', 'standaard_id')->withDefault();
    }
}
