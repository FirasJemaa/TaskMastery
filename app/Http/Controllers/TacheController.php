<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Couleur;
use App\Models\Statut;
use App\Models\Etiquette;
use App\Models\Projet;
use App\Models\Checklist;
use App\Models\Dependance;
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
    public function store($id, Request $request)
    {
        $tache = Tache::find($id);
        // je veux voir le contenu de $tache
        $tache->update([
            'designation' => $request->input('titre'),
            'date_debut' => $request->input('date_creation'),
            'date_cloture' => $request->input('date_cloture'),
            'id_etiquette' => $request->input('etiquette'),
            'id_statut' => $request->input('statut'),
        ]);
        
        $dependances = Dependance::all()->where('id_tache_1', $id);
        foreach ($dependances as $dependance) {
            $dependance->delete();
        }
        //creer les dependances recu dans request id_tache_1 correspond a la tache en cours et id_tache_2 correspond a la tache selectionner
        foreach ($request->input('dependances') as $dependance) {
            Dependance::create([
                'id_tache_1' => $id,
                'id_tache_2' => $dependance,
            ]);
        }

        $checkboxes = $request->input('checkboxes', []);
        $labels = $request->input('labels', []);

        foreach ($labels as $key => $label) {
            //grace a la clé qui correspond au id de la checklist on peut recuperer le id de la checklist ou la creation de la checklist
            $checklist = Checklist::find($key);
            if ($checklist) {
                $checklist->update([
                    'designation' => $label,
                    'checked' => in_array($key, $checkboxes),
                ]);
            } else {
                Checklist::create([
                    'designation' => $label,
                    'checked' => in_array($key, $checkboxes),
                    'id_tache' => $id,
                ]);
            }
        }
        
        
        return redirect()->route('dashboard');
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
        $tache          = Tache::find($id);
        $couleur        = Couleur::all()->where('id', $tache->id_couleur)->first();
        $statuts        = Statut::all()->sortBy('id');
        $etiquettes     = Etiquette::all()->sortBy('id');
        $taches         = Tache::leftJoin('dependances', 'taches.id', '=', 'dependances.id_tache_1')->get(['taches.*', 'dependances.id_tache_1', 'dependances.id_tache_2']);
        $checklists     = Checklist::all()->where('id_tache', $id)->sortBy('id');
        //pluk permet de recuperer un tableau avec les id de la table et toArray permet de convertir en tableau
        $selectedDependances = $taches->pluck('id_tache_2')->toArray();

        return view("tache", compact("tache", "couleur", "statuts", "etiquettes", "taches", "checklists", "selectedDependances"));
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
