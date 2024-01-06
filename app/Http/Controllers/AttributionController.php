<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attribution;

class AttributionController extends Controller
{
    public function index()
    {
        // Logique pour afficher la liste des attribues
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

        // chercher un utilisateur avec le pseudo
        $userInvite = User::where('pseudo', $pseudo)->first();

        //récuperer l'id du user connecté
        $user = auth()->user();

        // si l'userInvite existe on créer une attribution
        if($userInvite){
            Attribution::create([
                'id_tache' => $id_tache,
                'id_user' => $userInvite->id,
            ]);
        }else{
            // on retourne que le user n'existe pas
            return response()->json(['message' => 'L\'utilisateur '. $pseudo .' n\'existe pas.']);
        }

        // Répondre à la requête Ajax avec un message
        return response()->json(['message' => 'Votre demande d\'attribution a bien été prise en compte.']);
    }

}
