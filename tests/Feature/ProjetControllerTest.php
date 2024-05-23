<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Projet;

class ProjetControllerTest extends TestCase
{    
    public function testIndex()
    {

        // Créer des projets pour l'utilisateur connecté
        $projets = Projet::create(
            [
                'designation' => 'Projet 1',
                'description' => 'Description du projet 1',
                'id_user' => 1
            ],
            [
                'designation' => 'Projet 2',
                'description' => 'Description du projet 2',
                'id_user' => 1
            ]
        );

        // Appeler la méthode index du contrôleur
        $response = $this->get('/projets');

        // Vérifier si la réponse contient les projets
        $response->assertStatus(200);

        // Supprimer les projets
        $projets->delete();
    }

    public function testShow()
    {
        $projet = Projet::create(
            [
                'designation' => 'Projet',
                'description' => 'Description du projet',
                'id_user' => 1
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
        $projet = Projet::create(
            [
                'designation' => 'Projet',
                'description' => 'Description du projet',
                'id_user' => 1
            ]
        );
        $id = $projet->id;
        $response = $this->post("/deleteProjet/{$id}");
        
        $response->assertStatus(200);
        // Vérifier si le projet a été supprimé
        $this->assertNull(Projet::find($id));
    }
}
