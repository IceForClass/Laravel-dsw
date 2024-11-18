<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommunityLinkForm;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CommunityLink::with('channel'); 
    
        //  Enlaces populares
        if ($request->has('popular') && $request->popular) {
            $query->orderBy('approved', 'desc');
        }
    
        // Buscar por título o enlace
        if ($request->has('search') && $request->search) {
            $term = $request->search;
            $query->whereAny(['title', 'link'], 'like', '%' . $term . '%');
        }
    
        // Paginación de resultados
        $links = $query->paginate(10);
    
        return response()->json($links);
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Buscar el enlace por id
        $link = CommunityLink::find($id);

        // Si no se encuentra el enlace, retornar un JSON con mensaje de error
        if (!$link) {
            return response()->json(['message' => 'Link no encontrado'], 404);
        }

        // Retornar el enlace encontrado
        return response()->json($link, 200);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLinkForm $request)
    {
        $data = $request->validated();
        $link = new CommunityLink($data);
        $existing = $link->hasAlreadyBeenSubmitted();

        if (!$existing) {
            $link->user_id = Auth::id();
            $link->approved = Auth::user()->trusted ?? false;
            $link->save();
            $response = [
                'status' => 'success',
                'message' => 'Link created',
                'data' => $link,
                ];
        } else {
            $response = [
                'status' => 'success',
                'message' => 'Link already submitted',
                'data' => $link,
                ];
        }
        return response()->json($response,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Implementar lógica para actualizar un enlace
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Implementar lógica para eliminar un enlace
    }
}