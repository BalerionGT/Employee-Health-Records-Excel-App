<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folders = Reception::all();
        return view('folders.reception', compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reception.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "num_recu"=>"required",
            "num_cheque"=>"required"
        ]);
        $file = Reception::create([
                "num_recu"=>$request->num_recu,
                "date_reception"=>$request->date_reception,
                "num_cheque"=>$request->num_cheque,
                "dossier_rembourse"=>0,
                "montant_total"=>0,
            ]);
        return response()->json([
            'id'=>$file->id,
            'num_recu' => $file->num_recu,
            'num_cheque' => $file->num_cheque,
            'montant_total' => $file->montant_total, // Set this value accordingly
            'dossier_rembourse' => $file->dossier_rembourse // Set this value accordingly
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
        $file = Reception::where('id', $id)->first();
        if($file){
            $file->dossier_rembourse = $request->dossier_rembourse + 1;
            $file->montant_total = $request->montant_total + $request->montant_totale;

            $file->save();
        }
        return response()->json([
            'success' => true,
            'data' => ['id'=>$file->id, 'num_recu'=> $file->num_recu,'montant_total'=>$file->montant_total ,'dossier_rembourse'=> $file->dossier_rembourse ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getSubfolders(string $numReception){
        
        $folder = Reception::where('num_recu',$numReception)->first();
        $subfolders = $folder->subreceptions;
        if($subfolders){
            $subfoldersdata = [];
            foreach($subfolders as $subfolder){
                $subfolderdata = [
                    "matricule"=>$subfolder->matricule,
                    "adherent_nom"=>$subfolder->adherent_nom,
                    "adherent_prenom"=>$subfolder->adherent_prenom,
                    "montant_rembourse"=>$subfolder->montant_rembourse,
                    "montant_totale"=>$subfolder->montant_totale,
                    "part_medecin1"=>$subfolder->part_medecin1,
                    "part_medecin2"=>$subfolder->part_medecin2,
                    "part_adherent"=>$subfolder->part_adherent,
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
