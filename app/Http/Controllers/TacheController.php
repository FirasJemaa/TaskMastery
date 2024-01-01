<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Couleur;
use App\Models\Statut;
use App\Models\Etiquette;
use App\Models\Projet;
use App\Models\Checklist;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id_tache = $request->input('tacheId');
        $taches = Tache::all()->where("id", $id_tache)->sortBy("id");
        return view("tache", compact("taches"));
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
    public function store(Tache $tache, Request $request)
    {
        //jrécupère les modifications de $request et je mes a jour $tache
        $tache->update($request->all());
        return view('dashboard');
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

    public function showPage($id)//Tache $tache
    {
        $tache = Tache::find($id);
        $couleur = Couleur::all()->where('id', $tache->id_couleur)->first();
        $statuts = Statut::all()->sortBy('id');
        $etiquettes = Etiquette::all()->sortBy('id');
        $projets = Projet::all()->sortBy('id');
        $checklists = Checklist::all()->where('id_tache', $id)->sortBy('id');
        return view("tache", compact("tache", "couleur", "statuts", "etiquettes", "projets", "checklists"));
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
    public function update(Request $request)
    {
        // Recuperer l'id de la tache et la nouvelle valeur de notre checkbox ensuite on fait un update
        $id_tache = $request->input('tacheId');
        $bVal = $request->input('notification');

        $tache = Tache::find($id_tache);

        if ($tache) {
            $tache->update(['notification' => $bVal]);
            return response()->json($bVal);
        } else {
            return response()->json(['error' => 'La tâche ' . $bVal . ' n\'existe pas.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tache $tache)
    {
        //
    }
}
