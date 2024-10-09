<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verkoop extends Model
{
    use HasFactory;

    protected $fillable = ['datumtijd', 'organisatie_id'];

    public function organisatie()
    {
        return $this->belongsTo(Organisatie::class, 'organisatie_id', 'organisatie_id')->withDefault();
    }

    public function verkooplijnen()
    {
        return $this->hasMany(Verkooplijn::class);
    }

}
