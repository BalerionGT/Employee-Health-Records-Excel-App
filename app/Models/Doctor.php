<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
            'nom',
            'prenom',
            'tel',
            'adresse',
            'ville',
            'specialiste',
            'convention',
        ];
}
