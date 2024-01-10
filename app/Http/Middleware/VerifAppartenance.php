<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Projet;

class VerifAppartenance
{
    public function handle(Request $request, Closure $next)
    {
        $nID_projet = $request->route('n');
        //on vérifie si le projet appartient à l'utilisateur
        if (!$this->appartientAUtilisateur($nID_projet)) {
            return response()->json([
                'message' => 'Vous n\'avez pas accès à ce projet'
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }

    public function appartientAUtilisateur($nID)
    {
        $user = Auth::user();
        $id_user = $user->id;

        // Récupérez la tâche avec l'ID $nID
        $projet = Projet::where('id', '=', $nID)->where('id_user', '=', $id_user)->first();

        if ($projet && $id_user === $projet->id_user) {
            return true;
        }

        return false;
    }
}

