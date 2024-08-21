<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function homepage() {
        $pokemon = Pokemon::all();
        return view('homepage', compact('pokemon'));
    }
    public function index()
    {
        $pokemon = Pokemon::paginate(12);

        return view('pokemon.index', [
            'pokemon' => $pokemon,
        ]);
    }

    public function create() {
        return view('pokemon.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'pv' => 'required|integer',
            'taille' => 'required|numeric',
            'poids' => 'required|numeric',
        ]);

        Pokemon::create($validatedData);

        return redirect()->route('pokemon.index');
    }

    public function show($id)
    {
        $pokemon = Pokemon::findOrFail($id);

        return view('pokemon.show', [
            'pokemon' => $pokemon,
        ]);
    }

    public function edit(Pokemon $pokemon) {
        return view('pokemon.edit', compact('pokemon'));
    }

    public function update(Request $request, Pokemon $pokemon) {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'pv' => 'required|integer',
            'taille' => 'required|numeric',
            'poids' => 'required|numeric',
        ]);

        $pokemon->update($validatedData);

        return redirect()->route('pokemon.index');
    }

    public function destroy(Pokemon $pokemon) {
        $pokemon->delete();

        return redirect()->route('pokemon.index');
    }
}

