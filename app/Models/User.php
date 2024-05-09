<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'matricule',
        'departement',
        'sexe',
        'date_naissance',
        'date_recrutement',
        'situation_famille',
        'nbre_enfant',
        'matricule_conjoint',
        'validation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function conjoints(){
        return $this->hasMany(Conjoint::class, 'id_User');
    }

    public function enfants(){
        return $this->hasMany(Enfant::class, 'id_User');
    }
    // this is a recommended way to declare event handlers
    protected static function booted () {
        static::deleting(function(User $user) { // before delete() method call this
             $user->enfants()->delete();
             $user->conjoints()->delete();
             // do the rest of the cleanup...
        });
        }
}
