<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Http\Requests\CommunityLinkForm;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        // Comprobar si se ha solicitado la búsqueda de enlaces populares o recientes
        if (request()->exists('popular')) {
            if ($channel) {
                // Obtener los enlaces más populares dentro de un canal específico
                $links = (new CommunityLinkQuery())->getMostPopularByChannel($channel);
            } else {
                // Obtener los enlaces más populares en general
                $links = (new CommunityLinkQuery())->getMostPopular();
            }
        } else {
            if ($channel) {
                // Obtener los enlaces más recientes dentro del canal
                $links = (new CommunityLinkQuery())->getByChannel($channel);
            } else {
                // Obtener los enlaces más recientes en general
                $links = (new CommunityLinkQuery())->getAll();
            }
    
            // Verificar si se ha realizado una búsqueda
            if (request()->has('search') && $term = request()->get('search')) {
                // Obtener los enlaces basados en el término de búsqueda
                $links = (new CommunityLinkQuery())->search($term);
            }
        }
    
        // Obtener los canales para la vista
        $channels = Channel::orderBy('title', 'asc')->get();
    
        // Retornar la vista con los enlaces y los canales
        return view('dashboard', compact('links', 'channels'));
    }
    
    
      public function myLinks()
      {
          $user = Auth::user();
          $links = $user->myLinks()->paginate(10);
          
          return view('myLinks', compact('links'));
      }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLinkForm $request)
    {
    // Validar la entrada
    $data = $request->validated();
    $link = new CommunityLink($data);
    $existing = $link->hasAlreadyBeenSubmitted();
        
    if (!$existing) {
        $link->user_id = Auth::id();
        $link->approved = Auth::user()->trusted ?? false;
        
        $link->save();

        if (!Auth::user()->trusted) {
            return back()->with('status', 'Your link is under review for approval.');
        }

        
    }
    return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}