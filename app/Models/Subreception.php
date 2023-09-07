<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subreception extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Reception',
        'matricule',
        'date_visite',
        'adherent_nom',
        'adherent_prenom',
        'lien',
        'malade',
        'montant_totale',
        'remboursement_pevu',
        'solde',
        'observations',
        'montant_rembourse',
        'part_medecin1',
        'part_medecin2',
        'part_adherent'
    ];

    public function reception(){
        return $this->belongsTo(Envoie::class, 'id_Reception');
    }
}
