<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable= [
        'contenu',
        'date_envoi',
        'id_conversation',
        'id_utilisateur'
    ];
}
