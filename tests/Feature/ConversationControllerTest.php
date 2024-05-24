<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Tache;
use App\Models\Conversation;

use Tests\TestCase;

class ConversationControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $tache;
    //protected $conversation;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer un utilisateur et un projet associé à cet utilisateur
        $this->user = User::factory()->create();
        $this->tache = Tache::factory()->create();
        //$this->conversation = Conversation::factory()->create();

        // Authentifier l'utilisateur
        $this->actingAs($this->user);
    }

    public function testStore()
    {
        $request = [
            'id_tache' => $this->tache->id,
            'contenu' => 'contenu'
        ];

        $response = $this->post('/ajouterMessage', $request);
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $request = [
            'id_tache' => $this->tache->id
        ];

        $response = $this->get('/refreshConversation', $request);
        $response->assertStatus(200);
    }
}
