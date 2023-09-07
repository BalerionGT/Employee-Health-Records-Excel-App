<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envoie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'num_envoie',
        'date_envoie',
        'nbre_dossier',
        'montant_engage'
    ];
    public function subenvoies(){
        return $this->hasMany(Subenvoie::class, 'id_Envoie');
    }
}
