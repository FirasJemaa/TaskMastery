<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\TacheController;

class TacheControllerTest extends TestCase
{
    /**
     * Test de la méthode remplir session
     */
    
    public function testRemplirSession()
    {
        $tacheController = new TacheController();
        $tacheController->remplirSession(1);
        $this->assertEquals(1, $_SESSION['id_projet']);
    }
}