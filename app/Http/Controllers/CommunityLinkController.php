<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Models\Channel;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $links = CommunityLink::where('approved', 1)->paginate(25);
        $channels = Channel::orderBy('title','asc')->get();
        return view('dashboard', compact('links',  'channels'));
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
public function store(Request $request)
{
    // Validar la entrada
    $data = $request->validate([
        'title' => 'required|max:255',
        'link' => 'required|unique:community_links|url|max:255',
        'channel_id' => 'required|exists:channels,id',
    ]);

    $link = new CommunityLink($data);
    $link -> user_id = Auth::id();
    $link->approved = Auth::user()->trusted ?? false;
    $link ->save();
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
