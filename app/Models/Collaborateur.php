<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Collaborateur extends Authenticatable
{
    use HasFactory;

    protected $table = 'collaborateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'mail',
        'poste',
        'mot_de_passe',
        'pays',
        'telephone',
        'ville',
        'civilite',
        'date_naissance',
        'photo',
        'isadmin',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];
}
