<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//:View
    {
        $projets = Projet::all()->sortBy("id");
        dd($projets);
        return view("projets.index", compact("projets"));
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
        $id_user = $request->id;
        $projet = Projet::updateOrCreate(
            ['ID_User' => $id_user],
            ['designaion' => $request->designation,
             'description' => $request->description]
        );
        return Response()->json($projet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {
        return view("projets.show", compact("projet"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
