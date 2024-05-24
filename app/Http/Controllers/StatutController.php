<?php

namespace App\Http\Controllers;

use App\Models\Statut;

class StatutController extends Controller
{
    public function index()
    {
        $statuts = Statut::all()->sortBy("id");
        return view("projets.indexTache", compact("statuts"));
    }
}
