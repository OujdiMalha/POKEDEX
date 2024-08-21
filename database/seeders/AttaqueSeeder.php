<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attaque;

class AttaqueSeeder extends Seeder {
    public function run() {
        Attaque::create(['nom' => 'Tonnerre', 'degats' => 90, 'description' => 'Une puissante attaque électrique qui peut paralyser l\'adversaire.', 'type_id' => 1]); // Type Électrique
        Attaque::create(['nom' => 'Lance-Flammes', 'degats' => 90, 'description' => 'Une attaque de feu puissante qui peut infliger une brûlure.', 'type_id' => 2]); // Type Feu
        Attaque::create(['nom' => 'Hydrocanon', 'degats' => 110, 'description' => 'Une attaque d\'eau très puissante mais peu précise.', 'type_id' => 3]); // Type Eau
        Attaque::create(['nom' => 'Lance-Soleil', 'degats' => 120, 'description' => 'Une attaque en deux tours : se charge au premier et attaque au second.', 'type_id' => 4]); // Type Plante
        Attaque::create(['nom' => 'Laser Glace', 'degats' => 90, 'description' => 'Une attaque glaciale qui peut geler l\'adversaire.', 'type_id' => 5]); // Type Glace
        Attaque::create(['nom' => 'Séisme', 'degats' => 100, 'description' => 'Une puissante attaque de type sol qui touche tous les Pokémon en combat.', 'type_id' => 6]); // Type Sol
        Attaque::create(['nom' => 'Psyko', 'degats' => 90, 'description' => 'Une attaque mentale puissante qui peut réduire la défense spéciale de l\'adversaire.', 'type_id' => 7]); // Type Psy
        Attaque::create(['nom' => 'Ball\'Ombre', 'degats' => 80, 'description' => 'Une attaque spectrale qui peut réduire la défense spéciale de l\'adversaire.', 'type_id' => 8]); // Type Spectre
    }
}
