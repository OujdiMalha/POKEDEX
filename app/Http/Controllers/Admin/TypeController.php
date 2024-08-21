<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $types = Type::where('nom', 'LIKE', '%'.$search.'%')
            ->orWhere('couleur', 'LIKE', '%'.$search.'%')
            ->paginate(12);

        return view('admin.types.index', [
            'types' => $types,
        ]);
    }


    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
        ]);

        Type::create($request->all());

        return redirect()->route('admin.types.index')->with('success', 'Type créé avec succès.');
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
        ]);

        $type->update($request->all());

        return redirect()->route('admin.types.index')->with('success', 'Type mis à jour avec succès.');
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('success', 'Type supprimé avec succès.');
    }
}
