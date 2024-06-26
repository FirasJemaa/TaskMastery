<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Tache;

class TacheAppartenance
{
    public function handle(Request $request, Closure $next): Response
    {
        $nID_tache = $request->route('n');
        //on vérifie si la tache appartient à l'utilisateur
        if (!$this->appartientAUtilisateur($nID_tache)) {
            //retourner vers la page 403
            return redirect('/403');
            /*return response()->json([
                'message' => 'Vous n\'avez pas accès à cette tache'
            ], Response::HTTP_FORBIDDEN);*/
        }

        return $next($request);
    }

    private function appartientAUtilisateur($nID)
    {
        $user = Auth::user();
        $id_user = $user->id;

        // Récupérez la tâche avec l'ID $nID

        $tache = Tache::join('projets', 'taches.id_projet', 'projets.id')->where('taches.id', '=', $nID)->where('projets.id_user', '=', $id_user)->first();
        if ($tache) { // && $id_user === $tache->id_user) {
            return true;
        } else {
            $tache = Tache::join('attributions', 'taches.id', 'attributions.id_tache')
                ->where('taches.id', '=', $nID)
                ->where(function ($query) use ($id_user) {
                    $query->where('attributions.id_utilisateur', '=', $id_user)
                        ->orWhere('attributions.id_inviter', '=', $id_user);
                })
                ->first();
            if ($tache) { // && $id_user === $tache->id_user) {
                return true;
            } else {
                return false;
            }
        }
    }
}
