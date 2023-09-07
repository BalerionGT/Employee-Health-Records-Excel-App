<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_recu',
        'num_cheque',
        'dossier_rembourse',
        'date_reception',
        'montant_total'
    ];
    public function subreceptions(){
        return $this->hasMany(Subreception::class, 'id_Reception');
    }
}
