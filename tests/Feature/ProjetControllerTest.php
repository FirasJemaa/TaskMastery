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

    public function testIndex()
    {
        // Appeler la méthode index du contrôleur
        $response = $this->get('/projets');

        // Vérifier si la réponse contient les projets
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);

        $projet = Projet::create(
            [
                'designation' => 'Projet',
                'description' => 'Description du projet',
                'id_user' => $this->user->id
            ]
        );
        //Route::get('/showProjet/{n}', [ProjetController::class, 'show']);
        $response = $this->get("/showProjet/$projet->id");

        $response->assertStatus(200);
        $response->assertJson($projet->toArray());

        $projet->delete();
    }

    public function testDestroy()
    {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);

        $projet = Projet::create(
            [
                'designation' => 'Projet',
                'description' => 'Description du projet',
                'id_user' => $this->user->id
            ]
        );
        $id = $projet->id;
        $response = $this->post("/deleteProjet/$id");
        
        $response->assertStatus(200);
        // Vérifier si le projet a été supprimé
        $this->assertNull(Projet::find($id));
    }
}
