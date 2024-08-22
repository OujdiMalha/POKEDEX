<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * Test pour vérifier l'affichage de la page de connexion.
     *
     * @return void
     */
    public function testLoginPageDisplaysCorrectly()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Email') // Vérifie que le champ Email est présent
                    ->assertSee('Password') // Vérifie que le champ Password est présent
                    ->assertVisible('#email') // Vérifie que le champ Email est visible
                    ->assertVisible('#password') // Vérifie que le champ Password est visible
                    ->assertVisible('button[type="submit"]') // Vérifie que le bouton de connexion est visible
                    ->screenshot('login-page'); // Capture d'écran de la page de connexion
        });
    }

    /**
     * Test pour vérifier la fonctionnalité de connexion.
     *
     * @return void
     */
    public function testUserCanLogin()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create([ // Crée un utilisateur de test
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Assurez-vous que le mot de passe est crypté
            ]);

            $browser->visit('/login')
                    ->type('email', 'test@example.com') // Entrez l'email de l'utilisateur
                    ->type('password', 'password') // Entrez le mot de passe de l'utilisateur
                    ->press('Log in') // Cliquez sur le bouton de connexion
                    ->assertPathIs('/home') // Vérifie que l'utilisateur est redirigé vers la page d'accueil après la connexion
                    ->assertAuthenticatedAs($user) // Vérifie que l'utilisateur est authentifié
                    ->screenshot('user-logged-in'); // Capture d'écran après connexion
        });
    }
}
