<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PokemonPublicController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $pokemon = Pokemon::withCount('commentaires')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('pokemon.index', [
            'pokemon' => $pokemon,
        ]);
    }

    public function show($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $commentaires = $pokemon->commentaires()->with('user')->orderBy('created_at')->get();

        return view('pokemon.show', [
            'pokemon' => $pokemon,
            'commentaires' => $commentaires,
        ]);
    }

    public function addCommentaire(Request $request, Pokemon $pokemon)
    {
        $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        $commentaire = $pokemon->commentaires()->make();
        $commentaire->body = $request->input('body');
        $commentaire->user_id = auth()->Auth::user()->id;
        $commentaire->save();

        return redirect()->back();
    }

    public function deleteComment(Pokemon $pokemon, Commentaire $commentaire)
    {
        $this->authorize('delete', $commentaire);
        $commentaire->delete();
        return redirect()->back();
    }
}
