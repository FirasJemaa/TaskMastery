<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependance extends Model
{
    use HasFactory;
    protected $fillable= [
        'id_tache_1',
        'id_tache_2',
        'id_user'
    ];
}
