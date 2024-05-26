<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Controllers\StatutController;
use App\Models\Statut;
use App\Models\User;

class StatutControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $statut;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer un utilisateur et un projet associé à cet utilisateur
        $this->user = User::factory()->create();
        $this->statut = Statut::factory()->create();

        // Authentifier l'utilisateur
        $this->actingAs($this->user);
    }
    public function test_index(): void
    {
        $statutController = new StatutController();

        // Obtenez les statuts depuis la base de données avec le même ordre que dans le contrôleur
        $statuts = Statut::all()->sortBy("id");

        // Appel de la méthode index du contrôleur StatutController
        $response = $statutController->index();

        // Vérifiez que la vue retournée est celle attendue
        $this->assertEquals(
            view("projets.indexTache", compact("statuts")),
            $response
        );
    }
}
