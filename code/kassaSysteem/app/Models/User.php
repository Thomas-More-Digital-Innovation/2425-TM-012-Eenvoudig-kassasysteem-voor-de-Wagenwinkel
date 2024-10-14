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

    // Specify the table name explicitly
    protected $table = 'user_ids'; // Add this line

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'naam',
        'wachtwoord', // Ensure this matches your column name in the database
        'rol_id',
        'organisatie_id',
        'wachtwoordWijzigen'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'wachtwoord', // Change 'password' to 'wachtwoord'
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'wachtwoord' => 'hashed', // Change 'password' to 'wachtwoord'
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
