<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Projet;

class VerifAppartenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $nID = $request->route('n');
        // Vérification d'appartenance à l'utilisateur pour la méthode POST
        if (!$this->appartientAUtilisateur($nID)) {
            return redirect('/test')->with('error', 'Vous n\'avez pas l\'appartenance nécessaire.');
        }
        return $next($request);
    }

    protected function appartientAUtilisateur($nID){
        $user = Auth::user();
        $id_user = $user->id;

        // Récupérez la tâche avec l'ID $n
        $projet = Projet::find($nID);

        if ($id_user === $projet->id_user){
            return true;
        }else{
            return false;
        }
    }
}
