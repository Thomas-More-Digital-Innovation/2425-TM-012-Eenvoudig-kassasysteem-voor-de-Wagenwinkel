<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisatie extends Model
{
    use HasFactory;

    protected $primaryKey = 'organisatie_id';
    protected $fillable = ['naam'];


    public function wisselgelden()
    {
        return $this->hasMany(Wisselgeld::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function verkopen()
    {
        return $this->hasMany(Verkoop::class);
    }

    public function producten()
    {
        return $this->hasMany(Product::class);
    }
}
