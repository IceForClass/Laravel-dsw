<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    
    protected $perPage = 20;

    // Cantidad de elementos por página
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'image', 'password', 'trusted'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Hash para la seguridad de la contraseña
        ];
    }
    public function communityLinkUsers()
    {
        return $this->hasMany(\App\Models\CommunityLinkUser::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communityLinks()
    {
        return $this->hasMany(\App\Models\CommunityLink::class, 'id', 'user_id');
    }

    public function mylinks()
    {
        return $this->hasMany(CommunityLink::class);
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
        return $this->belongsToMany(CommunityLink::class, "community_link_users");
    }

    /**
     * Verifica si el usuario ha votado por un enlace específico.
     */
    public function votedFor(CommunityLink $link)
    {
        return $this->votes->contains($link);
    }
    
}