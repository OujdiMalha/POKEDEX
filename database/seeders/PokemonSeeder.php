<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use App\Models\User;
use App\Models\Type;
use App\Models\Attaque;

class PokemonSeeder extends Seeder {
    public function run() {
        $user = User::inRandomOrder()->first(); // Associe chaque Pokémon à un utilisateur aléatoire

        Pokemon::create([
            'nom' => 'Pikachu',
            'pv' => 100,
            'poids' => 6.0,
            'taille' => 0.4,
            'image' => 'images/pokemon1.jpg',
            'user_id' => $user->id
        ]);

        Pokemon::create([
            'nom' => 'Bulbizarre',
            'pv' => 90,
            'poids' => 6.9,
            'taille' => 0.7,
            'image' => 'images/pokemon2.jpg',
            'user_id' => $user->id
        ]);

        Pokemon::create([
            'nom' => 'Salamèche',
            'pv' => 95,
            'poids' => 8.5,
            'taille' => 0.6,
            'image' => 'images/pokemon3.jpg',
            'user_id' => $user->id
        ]);

        Pokemon::create([
            'nom' => 'Carapuce',
            'pv' => 85,
            'poids' => 9.0,
            'taille' => 0.5,
            'image' => 'images/pokemon4.jpg',
            'user_id' => $user->id
        ]);

        Pokemon::create([
            'nom' => 'Rondoudou',
            'pv' => 110,
            'poids' => 5.5,
            'taille' => 0.5,
            'image' => 'images/pokemon5.jpg',
            'user_id' => $user->id
        ]);

        Pokemon::create([
            'nom' => 'Miaouss',
            'pv' => 88,
            'poids' => 4.2,
            'taille' => 0.4,
            'image' => 'images/pokemon6.jpg',
            'user_id' => $user->id
        ]);

        // Optionnel : Associer des types et des attaques
        $typeElectrique = Type::where('nom', 'Électrique')->first();
        $attaqueEclair = Attaque::where('nom', 'Éclair')->first();

        if ($typeElectrique && $attaqueEclair) {
            Pokemon::where('nom', 'Pikachu')->first()->types()->attach($typeElectrique);
            Pokemon::where('nom', 'Pikachu')->first()->attaques()->attach($attaqueEclair);
        }
    }
}
