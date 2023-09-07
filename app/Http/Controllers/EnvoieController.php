<?php

namespace App\Http\Controllers;

use App\Models\Envoie;
use App\Models\Subenvoie;
use Illuminate\Http\Request;

class EnvoieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folders = Envoie::all(); 
        return view('folders.envoie', compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('envoie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "num_envoie"=>"required",
        ]);
        
        $file = Envoie::create([
                "num_envoie"=>$request->num_envoie,
                "date_envoie"=>$request->date_envoie,
                "nbre_dossier"=>0,
                "montant_engage"=>0,
            ]);
        return response()->json([
            'id'=>$file->id,
            'num_envoie' => $file->num_envoie,
            'montant_engage' => $file->montant_engage, // Set this value accordingly
            'nbre_dossier' => $file->nbre_dossier, // Set this value accordingly
        ], 201);
        
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
        $file = Envoie::where('id', $id)->first();
        if($file){
            $file->nbre_dossier = $request->nbre_dossier + 1;
            $file->montant_engage = $request->montant_engage + $request->montant_totale;

            $file->save();
        }
        return response()->json([
            'success' => true,
            'data' => ['id'=>$file->id, 'num_envoie'=> $file->num_envoie,'montant_engage'=>$file->montant_engage ,'nbre_dossier'=> $file->nbre_dossier ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getSubfolders(string $numEnvoie){
        
        $folder = Envoie::where('num_envoie',$numEnvoie)->first();
        $subfolders = $folder->subenvoies;
        if($subfolders){
            $subfoldersdata = [];
            foreach($subfolders as $subfolder){
                $subfolderdata = [
                    "matricule"=>$subfolder->matricule,
                    "date_visite"=>$subfolder->date_visite,
                    "adherent_nom"=>$subfolder->adherent_nom,
                    "adherent_prenom"=>$subfolder->adherent_prenom,
                    "malade"=>$subfolder->malade,
                    "montant_totale"=>$subfolder->montant_totale,
                    "lien"=>$subfolder->lien,
                    "observations"=>$subfolder->observations
                ];
                $subfoldersdata[] = $subfolderdata;
            }
            return response()->json([
                'success' => true,
                'data' => $subfoldersdata,
                'num_envoie' => $folder->num_envoie
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