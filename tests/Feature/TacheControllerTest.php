<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Projet;
use App\Models\Tache;
use Tests\TestCase;

class TacheControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $projet;
    protected $tache;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer un utilisateur et un projet associé à cet utilisateur
        $this->user = User::factory()->create();
        $this->projet = Projet::factory()->create(['id_user' => $this->user->id]);
        $this->tache = Tache::factory()->create(['id_projet' => $this->projet->id]);

        // Authentifier l'utilisateur
        $this->actingAs($this->user);
    }
    public function testIndex()
    {
        $response = $this->get('/taches');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        // Ajouter request
        $request = [
            'btn' => 'enregistrer',
            'titre' => 'titre',
            'designation' => 'designation',
        ];

        $id = $this->tache->id;

        // Simuler une session active
        $response = $this->post("/storeTache/$id", $request);

        // Vérifier le statut de la réponse
        $response->assertStatus(302);
    }

    public function testShow()
    {
        $id = $this->tache->id;
        $response = $this->get("/showTache/$id");

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $id = $this->tache->id;
        $request = [
            'tacheId' => $id,
            'etat' => 0
        ];
        $response = $this->post("/updateTache/$id", $request);
        $response->assertStatus(200);
    }

    public function testUpdateStatut()
    {
        $id = $this->tache->id;
        $request = [
            'tacheId' => $id,
            'statutId' => $this->tache->id_statut
        ];
        $response = $this->post("/updateStatutTache/$id", $request);
        $response->assertStatus(200);
    }
}
