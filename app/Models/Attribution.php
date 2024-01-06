<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribution extends Model
{
    use HasFactory;
    protected $fillable= [
        'id_tache',
        'id_utilisateur',
        'id_inviter',
        'createur'
    ];
}
