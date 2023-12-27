<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Projet;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taches = Tache::all()->sortBy("id");
        return view("projets.indexTache", compact("taches"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id_projet)
    { 
        //$taches = Tache::all()->where('id_projet', $id_projet)->sortBy("id");
        $taches = Tache::join('couleurs', 'couleurs.id', '=', 'taches.id_couleur')
        ->join('etiquettes', 'etiquettes.id', '=', 'taches.id_etiquette')
        ->where('id_projet', $id_projet)
        ->get(['taches.*', 'couleurs.code_couleur', 'etiquettes.designation as D_Etiquette']);
        return response()->json($taches);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tache $tache)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tache $tache)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tache $tache)
    {
        //
    }
}
