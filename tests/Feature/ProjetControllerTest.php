<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjetControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $projet;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer un utilisateur et un projet associé à cet utilisateur
        $this->user = User::factory()->create();
        $this->projet = Projet::factory()->create(['id_user' => $this->user->id]);

        // Authentifier l'utilisateur
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        // Appeler la méthode index du contrôleur
        $response = $this->get('/projets');

        // Vérifier si la réponse contient les projets
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $id = $this->projet->id;
        $response = $this->get("/showProjet/$id");

        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $id = $this->projet->id;
        $response = $this->post("/deleteProjet/$id");

        $response->assertStatus(200);
        // Vérifier si le projet a été supprimé
        $this->assertNull(Projet::find($id));
    }
}
