<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Pokemon;

class CreatePokemonTest extends DuskTestCase
{
    /**
     * Test de la création d'un Pokémon.
     *
     * @return void
     */
    public function testCreatePokemon()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/pokemon/create')
                    ->type('nom', 'Evoli')
                    ->type('pv', 100)
                    ->type('poids', 6.5)
                    ->type('taille', 0.3)
                    ->press('Sauvgarder')
                    ->assertPathIs('/pokemon')
                    ->assertSee('Evoli');

            // Nettoyage: Supprimer le Pokémon créé
            Pokemon::where('nom', 'Evoli')->delete();
        });
    }
}
