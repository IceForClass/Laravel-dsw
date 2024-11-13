<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // Cantidad de elementos por página
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password', // Incluye password para autenticación
        'image',
        'trusted', // Incluye el campo 'trusted' si lo necesitas en tu proyecto
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
            'password' => 'hashed', // Hash para la seguridad de la contraseña
        ];
    }

    /**
     * Relación uno a muchos: Un usuario puede tener muchos CommunityLinks.
     */
    public function myLinks(): HasMany
    {
        return $this->hasMany(CommunityLink::class, 'user_id'); // Confirma que 'user_id' sea correcto
    }

    /**
     * Relación para CommunityLinkUser.
     * 
     * Este método es de utilidad si necesitas acceder a los votos de un usuario.
     */
    public function communityLinkUsers(): HasMany
    {
        return $this->hasMany(CommunityLinkUser::class, 'user_id'); // Usa 'user_id' en lugar de 'id' si es el campo correcto
    }

    /**
     * Relación uno a muchos con CommunityLink.
     * 
     * Muestra los enlaces de comunidad asociados a un usuario.
     */
    public function communityLinks(): HasMany
    {
        return $this->hasMany(CommunityLink::class, 'user_id'); // Confirma que 'user_id' sea correcto
    }

    /**
     * Verifica si el usuario es de confianza.
     */
    public function isTrusted()
    {
        return $this->trusted;
    }

    /**
     * Relación muchos a muchos para los votos del usuario.
     */
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(CommunityLink::class, 'community_link_users');
    }

    /**
     * Verifica si el usuario ha votado por un enlace específico.
     */
    public function votedFor(CommunityLink $link)
    {
        return $this->votes->contains($link);
    }
}
