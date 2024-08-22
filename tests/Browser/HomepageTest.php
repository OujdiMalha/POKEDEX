<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Pokemon;

class HomepageTest extends DuskTestCase
{
    /**
     * Test pour vérifier l'affichage de la page d'accueil et la recherche de Pokémon.
     *
     * @return void
     */
    public function testHomepageDisplaysCorrectly()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('WELCOME TO POKEDEXIA') // Vérifie que le titre est présent
                    ->assertSee('Parcourez notre sélection de Pokémon') // Vérifie que le texte est présent
                    ->assertVisible('#search') // Vérifie que le champ de recherche est visible
                    ->assertVisible('button[type="submit"]') // Vérifie que le bouton de recherche est visible
                    ->assertSeeIn('.grid', 'Pikachu') // Vérifie qu'un Pokémon est affiché dans la grille (remplacez par un Pokémon existant)
                    ->screenshot('homepage'); // Capture d'écran de la page d'accueil
        });
    }

    /**
     * Test pour vérifier la fonctionnalité de recherche.
     *
     * @return void
     */
    public function testPokemonSearch()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('search', 'Pikachu') // Tapez un nom de Pokémon dans la recherche
                    ->press('button[type="submit"]') // Cliquez sur le bouton de recherche
                    ->assertPathIs('/') // Vérifie que l'utilisateur reste sur la bonne page
                    ->assertSee('Pikachu') // Vérifie que Pikachu est dans les résultats
                    ->screenshot('search-pikachu'); // Capture d'écran des résultats de la recherche
        });
    }
}
