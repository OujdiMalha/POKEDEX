<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attaque;
use App\Models\Type;
use Illuminate\Http\Request;

class AttaqueController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $attaques = Attaque::where('nom', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%')
            ->orWhereHas('type', function ($query) use ($search) {
                $query->where('nom', 'LIKE', '%'.$search.'%');
            })
            ->paginate(12);

        return view('admin.attaques.index', [
            'attaques' => $attaques,
        ]);
    }


    public function create()
    {
        $types = Type::all();
        return view('admin.attaques.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'dagats' => 'required|integer',
            'description' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
        ]);

        Attaque::create($request->all());

        return redirect()->route('admin.attaques.index')->with('success', 'Attaque created successfully.');
    }

    public function edit(Attaque $attaque)
    {
        $types = Type::all();
        return view('admin.attaques.edit', compact('attaque', 'types'));
    }

    public function update(Request $request, Attaque $attaque)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'degats' => 'required|integer',
            'description' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
        ]);

        $attaque->update($request->all());

        return redirect()->route('admin.attaques.index')->with('success', 'Attaque updated successfully.');
    }

    public function destroy(Attaque $attaque)
    {
        $attaque->delete();

        return redirect()->route('admin.attaques.index')->with('success', 'Attaque deleted successfully.');
    }
}
