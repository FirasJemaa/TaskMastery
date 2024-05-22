<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;

class AccueilController extends Controller
{
    public function index():View
    {
        return view("accueil");
    }
}
