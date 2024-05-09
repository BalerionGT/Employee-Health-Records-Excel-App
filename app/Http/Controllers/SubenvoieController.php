<?php

namespace App\Http\Controllers;

use App\Models\Envoie;
use App\Models\Subenvoie;
use Illuminate\Http\Request;

class SubenvoieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subfolders = Subenvoie::all();
        return view('folders.maladie',compact('subfolders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Subenvoie::create([
            "id_Envoie"=>$request->id,
            "matricule"=>$request->matricule,
            "date_visite"=>$request->date_visite,
            "adherent_nom"=>$request->adherent_nom,
            "adherent_prenom"=>$request->adherent_prenom,
            "lien"=>$request->lien,
            "malade"=>$request->malade,
            "visite"=>$request->visite,
            "pharmacie"=>$request->pharmacie,
            "radio"=>$request->radio,
            "analyse"=>$request->analyse,
            "auxiliaires"=>$request->auxiliaires,
            "optique"=>$request->optique,
            "soin_dentaires"=>$request->soin_dentaires,
            "prothèse"=>$request->prothèse,
            "autres"=>$request->autres,
            "prise_en_charge"=>$request->prise_en_charge,
            "observations"=>$request->observations,
            "montant_totale"=>$request->montant_totale,
            "solde"=>0,
        ]);
    
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

    public function getAllSubfolders(string $matricule){

        $subfolders = Subenvoie::where('matricule', $matricule)
        ->where('solde',0)
        ->orderBy('date_visite', 'asc')
        ->get();
    if($subfolders){
        $subfoldersdata = [];
        foreach($subfolders as $subfolder){
            $num = Subenvoie::find($subfolder->id)->envoie->num_envoie;
            $subfolderdata = [
                "matricule"=>$subfolder->matricule,
                "num_envoie"=>$num,
                "date_visite"=>$subfolder->date_visite,
                "adherent_nom"=>$subfolder->adherent_nom,
                "adherent_prenom"=>$subfolder->adherent_prenom,
                "malade"=>$subfolder->malade,
                "montant_totale"=>$subfolder->montant_totale,
                "lien"=>$subfolder->lien
            ];
            $subfoldersdata[] = $subfolderdata;
        }
        return response()->json([
            'success' => true,
            'data' => $subfoldersdata
        ]);
    }
     else {
        return response()->json([
            'success' => false,
            'message' => 'folders not found.',
        ]);
    }
    }
    }
    

