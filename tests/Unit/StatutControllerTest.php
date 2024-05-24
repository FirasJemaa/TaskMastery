<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\StatutController;
use App\Models\Statut;

class StatutControllerTest extends TestCase
{
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
