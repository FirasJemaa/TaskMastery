<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use Illuminate\Http\Request;

class StatutController extends Controller
{
    public function index()//:View
    {
        $statuts = Statut::all()->sortBy("id");
        return view("projets.indexTache", compact("statuts"));
    }
}
