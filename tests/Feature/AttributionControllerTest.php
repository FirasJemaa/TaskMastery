<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Attribution;
use App\Models\Tache;
use Tests\TestCase;

class AttributionControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $user2;
    protected $tache;
    protected $attribution;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer un utilisateur et un projet associé à cet utilisateur
        $this->user = User::factory()->create();
        $this->user2 = User::factory()->create();
        $this->tache = Tache::factory()->create();
        $this->attribution = Attribution::factory()->create([
            'id_tache' => $this->tache->id,
            'id_utilisateur' => $this->user->id,
            'id_inviter' => $this->user2->id,
        ]);

        // Authentifier l'utilisateur
        $this->actingAs($this->user);
    }

    public function test_index()
    {
        $response = $this->get('/indexAttribution');

        $response->assertStatus(200);
    }

    public function test_destroy()
    {
        // Changer d'authentification
        $this->actingAs($this->user2);

        $id = $this->attribution->id;
        //Route : Route::post('/deleteAttribution/{id}', [AttributionController::class, 'destroy'])->name('delete.attribution');
        $response = $this->post("/deleteAttribution/$id");

        $response->assertStatus(200);
    }

    public function test_store()
    {
        $response = $this->post('/ajouterContact', [
            'pseudo' => 'test',
            'id_tache' => $this->tache->id
        ]);

        $response->assertStatus(200);
    }
}
