<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\StatutController;

class StatutControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_index(): void
    {
        $statut = new StatutController();
        $this->assertEquals(
            view("projets.indexTache", compact("statuts")),
            $statut->index()
        );
    }
}
