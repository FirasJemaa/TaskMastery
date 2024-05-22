<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tache;
use App\Models\Attribution;

class AttributionController extends Controller
{
    public function index()
    {
        $user = auth()->id();
        $taches = Tache::join('attributions', 'taches.id', 'attributions.id_tache')
        ->join('users', 'attributions.id_inviter', 'users.id')
        ->join('users as u', 'attributions.id_utilisateur', 'u.id')
        ->join('statuts', 'statuts.id', 'taches.id_statut')
            ->select('attributions.id as id_attribution','taches.*', 'statuts.designation as DS', 'attributions.id_inviter', 'u.pseudo')    
        ->where('attributions.id_inviter', '=', $user)
            ->get();

        return view('attribution', compact('taches'));
    }

    public function destroy($id)
    {
        $attribution = Attribution::find($id);

        if (!$attribution) {
            return response()->json(['message' => 'L\'attribution n\'existe pas.'], 404);
        }

        $user = auth()->id();

        if ($attribution->id_inviter != $user) {
            return response()->json(['message' => 'Vous n\'êtes pas l\'inviteur de cette attribution.'], 403);
        }

        // Supprimer l'attribution
        $attribution->delete();

        return response()->json(['message' => 'Attribution supprimée avec succès.'], 200);
    }

    public function store(Request $request)
    {
        $pseudo = $request->input('pseudo');
        $id_tache = $request->input('id_tache');

        try {
            // vérifier qu'on est le créateur de la tâche
            $tache = Tache::join('projets', 'taches.id_projet', 'projets.id')
                ->where('taches.id', '=', $id_tache)
                ->where('projets.id_user', '=', auth()->id())
                ->first();

            if (!$tache) {
                return response()->json(['message' => 'Vous n\'êtes pas le créateur de cette tâche.']);
            }

            // Chercher un utilisateur avec le pseudo
            $userInvite = User::where('pseudo', $pseudo)->firstOrFail();

            // Récupérer l'id du user connecté
            $userID = auth()->id();

            // Chercher si l'affectation existe déjà
            $attribution = Attribution::where('id_tache', $id_tache)
                ->where('id_utilisateur', $userID)
                ->where('id_inviter', $userInvite->id)
                ->first();

            if ($attribution) {
                // Si l'affectation existe déjà, on retourne un message
                return response()->json(['message' => 'L\'utilisateur ' . $pseudo . ' a déjà été invité à cette tâche.']);
            }

            // Si l'utilisateur existe et n'est pas le même que l'utilisateur connecté, on crée une attribution
            if ($userInvite->id != $userID) {
                Attribution::create([
                    'id_tache' => $id_tache,
                    'id_utilisateur' => $userID,
                    'id_inviter' => $userInvite->id,
                    'createur' => true
                ]);

                // Répondre à la requête Ajax avec un message
                return response()->json(['message' => 'Votre demande d\'attribution a bien été prise en compte.']);
            } else {
                // On retourne que le user est le même que l'utilisateur connecté
                return response()->json(['message' => 'L\'utilisateur ' . $pseudo . ' est le même que l\'utilisateur connecté.']);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // On retourne que le user n'existe pas
            return response()->json(['message' => 'L\'utilisateur ' . $pseudo . ' n\'existe pas.']);
        }
    }
}
