<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Projet;
use App\Models\Couleur;
use App\Models\Statut;
use App\Models\Etiquette;
use App\Models\Checklist;
use App\Models\Dependance;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_projet)
    {
        $taches = Tache::all()->where("id_projet", $id_projet)->sortBy("id");
        $projet = Projet::find($id_projet);
        return view("taches", compact("taches", "projet"));
    }

    public function remplirSession($id_projet)
    {
        //enregistrer dans $_SESSION id projet pour qu'on reouvre celle ci dans le dashboard
        // si mode test (intégrer) ne pas executer sinon test unit faire
        if (app()->environment('testing')){
            return;
        }
        session_start();
        $_SESSION['id_projet'] = $id_projet;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        if ($request->input('btn') === 'enregistrer') {
            $tache = Tache::find($id);
            // je veux voir le contenu de $tache
            $tache->update([
                'titre' => $request->input('titre') ? $request->input('titre') : $tache->titre,
                'designation' => $request->input('designation') ? $request->input('designation') : $tache->designation,
                'date_debut' => $request->input('date_creation') ? $request->input('date_creation') : $tache->date_creation,
                'date_cloture' => $request->input('date_cloture') ? $request->input('date_cloture') : $tache->date_cloture,
                'id_etiquette' => $request->input('etiquette') ? $request->input('etiquette') : $tache->id_etiquette,
                'id_statut' => $request->input('statut') ? $request->input('statut') : $tache->id_statut,
            ]);

            $couleur = Couleur::where('code_couleur', hexdec(substr($request->input('couleur'), 1)))->first();
            if ($couleur) {
                $tache->update([
                    'id_couleur' => $couleur->id,
                ]);
            } else {
                $couleur = Couleur::create([
                    'code_couleur' => hexdec(substr($request->input('couleur'), 1)),
                ]);
                $tache->update([
                    'id_couleur' => $couleur->id,
                ]);
            }

            $dependances = Dependance::where('id_user', '=', auth()->id())
                ->where('id_tache_1', $id)
                ->get();

            foreach ($dependances as $dependance) {
                $dependance->delete();
            }
            
            if ($request->input('dependances')){
                foreach ($request->input('dependances') as $dependance) {
                    Dependance::create([
                        'id_tache_1' => $id,
                        'id_tache_2' => $dependance,
                        'id_user' => auth()->id(),
                    ]);
                }
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
        } else{
            $tache = Tache::join('projets', 'taches.id_projet', 'projets.id')
                ->where('taches.id', '=', $id)
                ->where('projets.id_user', '=', auth()->id())
                ->first();
            if (!$tache) {
                //renvoyer page 403
                return redirect('/403');
            }else{
                $tache = Tache::find($id);
                $tache->delete();
            }
        }
        $this->remplirSession($tache->id_projet);

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

    public function showPage($id)
    {
        $bProprietaire  = false;
        $tache          = Tache::find($id);
        $couleur        = Couleur::all()->where('id', $tache->id_couleur)->first();
        $statuts        = Statut::all()->sortBy('id');
        $etiquettes     = Etiquette::all()->sortBy('id');
        $taches         = Tache::leftJoin('projets', 'projets.id', '=', 'taches.id_projet')
            ->where('projets.id_user', '=', auth()->id())
            ->where('taches.id', '!=', $tache->id)
            ->get(['taches.*']);
        $checklists     = Checklist::all()->where('id_tache', $id)->sortBy('id');
        //pluk permet de recuperer un tableau avec les id de la table et toArray permet de convertir en tableau
        //$selectedDependances = $taches->pluck('id_tache_2')->toArray();
        $selectedDependances = Dependance::where('id_tache_1', $id)->get()->pluck('id_tache_2')->toArray();
        //voir s'il est le propriétaire de la tache
        $tacheControle = Tache::join('projets', 'taches.id_projet', 'projets.id')
            ->where('taches.id', '=', $id)
            ->where('projets.id_user', '=', auth()->id())
            ->first();
        if ($tacheControle) {  
            //renvoyer page 403
            $bProprietaire = true;
        }
        
        $this->remplirSession($tache->id_projet);
        return view("tache", compact("tache", "couleur", "statuts", "etiquettes", "taches", "checklists", "selectedDependances", "bProprietaire"));
    }

    public function newPage($id_projet)
    {
        //creation d'une nouvelle tache
        $tache = new Tache();
        $tache->id_projet = $id_projet;
        $tache->titre = "";
        $tache->designation = "";
        $tache->date_creation = date("Y-m-d");
        $tache->etat = false;
        $tache->id_couleur = 1;
        $tache->id_etiquette = 1;
        $tache->id_statut = 1;
        $tache->save();

        $statuts = Statut::all()->sortBy("id");
        $etiquettes = Etiquette::all()->sortBy("id");
        $couleur = Couleur::all()->where('id', $tache->id_couleur)->first();
        $taches = Tache::leftJoin('dependances', 'taches.id', '=', 'dependances.id_tache_1')
            ->leftJoin('projets', 'projets.id', '=', 'taches.id_projet')
            ->where('projets.id_user', '=', auth()->id())
            ->where('taches.id', '!=', $tache->id)
            ->orderBy('taches.id')
            ->get(['taches.*', 'dependances.id_tache_1', 'dependances.id_tache_2']);
        $checklists = Checklist::all()->where('id_tache', $tache->id)->sortBy('id');
        $selectedDependances = [];

        $bProprietaire = true;
        $this->remplirSession($tache->id_projet);

        return view("tache", compact("tache", "couleur", "statuts", "etiquettes", "taches", "checklists", "selectedDependances", "bProprietaire"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Recuperer l'id de la tache et la nouvelle valeur de notre checkbox ensuite on fait un update
        $id_tache = $request->input('tacheId');
        $bVal = $request->input('etat');

        $tache = Tache::find($id_tache);

        if ($tache) {
            $tache->update(['etat' => $bVal]);
            return response()->json($bVal);
        } else {
            return response()->json(['error' => 'La tâche ' . $bVal . ' n\'existe pas.'], 404);
        }
    }

    public function udpateStatut(Request $request)
    {
        // Recuperer l'id de la tache et la nouvelle valeur de notre checkbox ensuite on fait un update
        $id_tache = $request->input('tacheId');
        $id_statut = $request->input('statutId');

        $tache = Tache::find($id_tache);

        if ($tache) {
            $tache->update(['id_statut' => $id_statut]);
            return response()->json($id_statut);
        } else {
            return response()->json(['error' => 'La tâche ' . $id_statut . ' n\'existe pas.'], 404);
        }
    }
}
