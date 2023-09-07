<?php

namespace App\Http\Controllers;

use App\Models\Conjoint;
use Illuminate\Http\Request;

class ConjointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conjoints = Conjoint::all();
        return view('conjoints.show',compact('conjoints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conjoints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Conjoint::create([
            "id_User"=>$request->id,
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "sexe"=>$request->sexe,
            "date_naissance"=>$request->date_naissance,
            "code_assurance"=>$request->code_assurance,
            "date_debut_adherence"=>$request->date_debut_adherence,
            "date_fin_adherence"=>$request->date_fin_adherence,
            "validation"=>$request->validation,
            "affil"=>$request->affil
        ]);
        return response()->json(['success' => true]);

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
        $conjoint = Conjoint::where('id',$id)->first();
        return view('conjoints.edit',compact('conjoint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $conjoint = Conjoint::where('id',$id)->first();
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "sexe"=>"required",
            "date_naissance"=>"required",
            "code_assurance"=>"required",
            "date_debut_adherence"=>"required",
            "date_fin_adherence"=>"required",
            "validation"=>"required",
            "affil"=>"required"
        ]);

        $conjoint->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "sexe"=>$request->sexe,
            "date_naissance"=>$request->date_naissance,
            "date_debut_adherence"=>$request->date_debut_adherence,
            "date_fin_adherence"=>$request->date_fin_adherence,
            "validation"=>$request->input('validation') === "Oui" ? 1 : 0,
            "validation"=>$request->input('affil') === "Oui" ? 1 : 0,
        ]);
        return back()->with("success","Mise à jours du conjoint avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $conjoint = Conjoint::where('id',$id)->first();
        $conjoint->delete();
        return Redirect()->route('conjoints.index')->with('success', 'Conjoint supprimé avec succès!');
    }
}
