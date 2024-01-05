<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable= [
        'titre',
        'priorite',
        'designation',
        'date_creation',
        'date_cloture',
        'etat',
        'id_projet',
        'id_couleur',
        'id_etiquette',
        'id_statut',
    ];
}
