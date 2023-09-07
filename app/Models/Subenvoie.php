<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subenvoie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_Envoie',
        'matricule',
        'date_visite',
        'adherent_nom',
        'adherent_prenom',
        'lien',
        'malade',
        'visite',
        'pharmacie',
        'radio',
        'analyse',
        'auxiliaires',
        'optique',
        'soin_dentaires',
        'prothèse',
        'autres',
        'prise_en_charge',
        'observations',
        'montant_totale',
        'solde'
    ];
    public function envoie(){
        return $this->belongsTo(Envoie::class, 'id_Envoie');
    }
}
