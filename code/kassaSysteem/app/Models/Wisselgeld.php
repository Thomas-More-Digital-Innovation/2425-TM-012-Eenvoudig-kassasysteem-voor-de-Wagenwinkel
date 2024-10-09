<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisselgeld extends Model
{
    use HasFactory;
    protected $table = 'wisselgelden';
    protected $guarded = ['wisselgeld'];

    public function muntstuk()
    {
        return $this->belongsTo(Muntstuk::class, 'muntstuk_id', 'muntstuk_id')->withDefault();
    }

    public function organisatie()
    {
        return $this->belongsTo(Organisatie::class, 'organisatie_id', 'organisatie_id')->withDefault();
    }
}
