<?php

namespace App\Http\Controllers;

use App\Models\Subenvoie;
use App\Models\Subreception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubreceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = Subreception::create([
            "id_Reception"=>$request->id,
            "matricule"=>$request->matricule,
            "date_visite"=>$request->date_visite,
            "adherent_nom"=>$request->adherent_nom,
            "adherent_prenom"=>$request->adherent_prenom,
            "lien"=>$request->lien,
            "malade"=>$request->malade,
            "part_medecin2"=>$request->part_medecin2,
            "part_medecin1"=>$request->part_medecin1,
            "remboursement_pevu"=>$request->remboursement_pevu,
            "montant_rembourse"=>$request->montant_rembourse,
            "part_adherent"=>$request->part_adherent,
            "observations"=>$request->observations,
            "montant_totale"=>$request->montant_totale,
            "solde"=>$request->solde === "Oui" ? 1:0,
        ]);

        $related_envoie = Subenvoie::where('matricule', $request->matricule)
        ->where('date_visite', $request->date_visite)
        ->where('malade', $request->malade)
        ->first();
    
    if ($related_envoie) {
        $related_envoie->update([
            "solde" => 1
        ]);
    }
    
    
        return back()->with("success","Sub folder ajouté avec succès!");;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
