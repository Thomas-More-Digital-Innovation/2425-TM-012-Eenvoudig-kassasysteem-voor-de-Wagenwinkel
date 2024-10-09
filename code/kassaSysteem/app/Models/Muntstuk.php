<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muntstuk extends Model
{
    use HasFactory;

    protected $guarded = ['muntstuk_id', 'naam', 'waarde', 'afbeelding'];

    public function wisselgelden()
    {
        return $this->hasMany(Wisselgeld::class);
    }
}
