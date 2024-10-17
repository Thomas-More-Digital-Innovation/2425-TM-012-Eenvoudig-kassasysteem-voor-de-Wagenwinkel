<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    // Explicitly define the table name
    protected $table = 'users';

    // Specify the primary key as 'user_Id'
    protected $primaryKey = 'user_Id';

    // If 'user_Id' is not auto-incrementing, add this line:
    public $incrementing = false;

    // Define the key type (only necessary if it's not an integer)
    protected $keyType = 'int';  // Change to 'string' if it's a string

    public $timestamps = false;

    protected $fillable = [
        'naam',
        'wachtwoord',
        'rol_id',
        'organisatie_id',
        'wachtwoordWijzigen',
    ];

    protected $hidden = [
        'wachtwoord',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    // Find method to locate a user by user_Id
    public static function find($user_Id)
    {
        return static::where('user_Id', $user_Id)->first();
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'wachtwoord' => 'hashed',
        ];
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id')->withDefault();
    }

    public function organisatie()
    {
        return $this->belongsTo(Organisatie::class, 'organisatie_id', 'organisatie_id')->withDefault();
    }
}

