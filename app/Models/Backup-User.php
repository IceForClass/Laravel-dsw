<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // Importa HasMany

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
            'password' => 'hashed',
        ];
    }

    /**
     * Relación uno a muchos: Un usuario puede tener muchos CommunityLinks.
     */
    public function myLinks(): HasMany
    {
        return $this->hasMany(CommunityLink::class, 'user_id'); // Asegúrate de que 'user_id' sea el campo correcto
    }

    public function isTrusted()
    {
        return $this->trusted;
    }

    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_link_users');
    }

    public function votedFor(CommunityLink $link)
    {
        return $this->votes->contains($link);
    }
}