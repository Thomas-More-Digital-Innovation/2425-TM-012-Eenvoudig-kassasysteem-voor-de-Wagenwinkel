<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verkoop extends Model
{
    use HasFactory;
    protected $table = 'verkopen';
    protected $fillable = ['datum_tijd', 'organisatie_id'];

    public $timestamps = false;

    public function organisatie()
    {
        return $this->belongsTo(Organisatie::class, 'organisatie_id', 'organisatie_id')->withDefault();
    }

    public function verkooplijnen()
    {
        return $this->hasMany(Verkooplijn::class);
    }

}
