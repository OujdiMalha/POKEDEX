<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $pokemon = Pokemon::with(['types', 'commentaires'])
            ->where(function ($query) use ($search) {
                $query->where('nom', 'LIKE', '%'.$search.'%')
                    ->orWhere('pv', 'LIKE', '%'.$search.'%')
                    ->orWhere('taille', 'LIKE', '%'.$search.'%')
                    ->orWhere('poids', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('types', function ($query) use ($search) {
                        $query->where('nom', 'LIKE', '%'.$search.'%');
                    });
            })
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('homepage.index', [
            'pokemon' => $pokemon,
        ]);
    }
}
