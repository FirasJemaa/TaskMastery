<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//:View
    {
        $projets = Projet::all()->sortBy("id");
        return view("projets.indexProjet", compact("projets"));
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
        //je récupère l'ID du user
        $user = Auth::user();
        $id_user = $user->id;

        $id_projet = request()->id;
        $projet = Projet::updateOrCreate(
            ['id' => $id_projet],
            [
                'id_user' => $id_user,
                'designation' => $request->designation,
                'description' => $request->description
            ]
        );
        return Response()->json($projet);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $projet = Projet::find($id);
        return response()->json($projet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        return view("projets.edit",compact('projet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $request;/*
        // Mettre à jour les champs du projet
        $projet->update([
            'designation' => $request->designation,
            'description' => $request->description
        ]);
    
        // Retourner la réponse JSON
        return response()->json($projet);*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Projet::find($id)->delete();
        return response()->json(['message' => "Projet $id supprimé avec succès"]);
    }
}
