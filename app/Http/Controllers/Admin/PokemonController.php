<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;

class PokemonController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $pokemon = pokemon::where('nom', 'LIKE', '%'.$search.'%')
            ->orWhere('pv', 'LIKE', '%'.$search.'%')
            ->orWhere('poids', 'LIKE', '%'.$search.'%')
            ->orWhere('taille', 'LIKE', '%'.$search.'%')
            ->orWhereHas('types', function ($query) use ($search) {
                $query->where('nom', 'LIKE', '%'.$search.'%');
            })
            ->paginate(12);


        return view('admin.pokemon.index', [
            'pokemon' => $pokemon,
        ]);
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.pokemon.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'pv' => 'required|integer',
            'taille' => 'required|numeric',
            'poids' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'types' => 'array',
        ]);

        $pokemon = Pokemon::create($request->only(['nom', 'pv', 'taille', 'poids']));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $pokemon->image = $path;
        }

        $pokemon->save();

        // Sync types
        $pokemon->types()->sync($request->types);

        return redirect()->route('admin.pokemon.index')->with('success', 'Pokemon créé avec succès.');
    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $types = Type::all();
        return view('admin.pokemon.edit', compact('pokemon', 'types'));
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'pv' => 'required|integer',
            'poids' => 'required|numeric',
            'taille' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'types' => 'array',
        ]);

        $pokemon->update($request->only(['nom', 'pv', 'poids', 'taille']));

        if ($request->hasFile('image')) {
            // Supprimez l'ancienne image si elle existe
            if (!empty($pokemon->image) && Storage::disk('public')->exists($pokemon->image)) {
                Storage::disk('public')->delete($pokemon->image);
            }

            // Stockez la nouvelle image
            $path = $request->file('image')->store('images', 'public');
            $pokemon->image = $path;
        }

        $pokemon->save();

        // Sync types
        $pokemon->types()->sync($request->types);

        return redirect()->route('admin.pokemon.index')->with('success', 'Pokemon mis à jour avec succès.');
    }

    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->image) {
            Storage::disk('public')->delete($pokemon->image);
        }
        $pokemon->delete();

        return redirect()->route('admin.pokemon.index')->with('success', 'Pokemon supprimé avec succès.');
    }
}
