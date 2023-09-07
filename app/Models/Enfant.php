<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_User',
        'id',
        'nom',
        'prenom',
        'sexe',
        'date_naissance',
        'code_assurance',
        'date_debut_adherence',
        'date_fin_adherence',
        'affil',
        'validation',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_User');
    }
}
