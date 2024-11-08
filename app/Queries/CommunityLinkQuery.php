<?php
namespace App\Queries;

use App\Models\CommunityLink;
use App\Models\Channel;

class CommunityLinkQuery
{
    public function getByChannel(Channel $channel)
    {
        // Usar la relación hasMany para obtener los links aprobados del canal seleccionado
        $links = $channel->communityLinks()
            ->where('approved', true)
            ->latest('updated_at')
            ->paginate(10);
            return $links;
    }

    public function getAll()
    {
        // Mostrar todos los links aprobados si no hay un canal seleccionado
        $links = CommunityLink::where('approved', true)
            ->latest('updated_at')
            ->paginate(10);
        return $links;
    }

    public function getMostPopular()
    {
                // esto muestra los links en orden segun la cantidad de votos
                $links = CommunityLink::where('approved', true)
                    ->withCount('users')
                    ->orderBy('users_count', 'desc')
                    ->paginate(10);
                    return $links;
    }

    public function getMostPopularByChannel(Channel $channel)
    {
        $links = $channel->communityLinks()
            ->where('approved', true)
            ->withCount('users')
            ->orderBy('users_count', 'desc')
            ->paginate(10);
        return $links;
    }

    public function search($term)
    {
        // Mostrar todos los links aprobados si no hay un canal seleccionado
        $links = CommunityLink::where('approved', true)
            ->latest('updated_at')
            ->paginate(10);
        return $links;
    }

}