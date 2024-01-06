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
        $taches = Tache::join('attributions', 'taches.id', 'attributions.id_tache')->where('attributions.id_inviter', '=', $user)->get();

        return view('attribution', compact('taches'));
    }

    public function show($id)
    {
        // Logique pour afficher un attribut spécifique
    }

    public function create()
    {
        // Logique pour afficher le formulaire de création d'une attribution
    }

    public function store(Request $request)
    {
        $pseudo = $request->input('pseudo');
        $id_tache = $request->input('id_tache');

        try {
            // Chercher un utilisateur avec le pseudo
            $userInvite = User::where('pseudo', $pseudo)->firstOrFail();

            // Récupérer l'id du user connecté
            $userID = auth()->id();

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
