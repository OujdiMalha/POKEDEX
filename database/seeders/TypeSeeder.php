<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder {
    public function run() {
        Type::create(['nom' => 'Électrique', 'couleur' => 'jaune']);
        Type::create(['nom' => 'Feu', 'couleur' => 'rouge']);
        Type::create(['nom' => 'Eau', 'couleur' => 'bleu']);
        Type::create(['nom' => 'Plante', 'couleur' => 'vert']);
        Type::create(['nom' => 'Glace', 'couleur' => 'cyan']);
        Type::create(['nom' => 'Sol', 'couleur' => 'marron']);
    }
}
