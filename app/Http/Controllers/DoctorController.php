<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medecins = Doctor::all();
        return view('doctors.show',compact('medecins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "tel"=>"required",
            "adresse"=>"required",
            "ville"=>"required",
        ]);
        
        Doctor::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "tel"=>$request->tel,
            "adresse"=>$request->adresse,
            "ville"=>$request->ville,
            "specialiste"=>$request->géneraliste === "on" ? "géneraliste" : $request->spécialité,
            "convention"=>$request->input('convention-oui') === "on" ? 1 : 0,
        ]);
        return back()->with("success","Docteur ajouté avec succès!");
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
        $medecin = Doctor::where('id',$id)->first();
        return view('doctors.edit',compact('medecin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medecin = Doctor::where('id',$id)->first();
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "tel"=>"required",
            "adresse"=>"required",
            "ville"=>"required",
        ]);
        $medecin->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "tel"=>$request->tel,
            "adresse"=>$request->adresse,
            "ville"=>$request->ville,
            "specialiste"=>$request->géneraliste === "on" ? "géneraliste" : $request->spécialité,
            "convention"=>$request->input('convention-oui') === "on" ? 1 : 0,
        ]);
        return back()->with("success","Mise à jours du docteur avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medecin = Doctor::where('id',$id)->first();
        $medecin->delete();
        return Redirect()->route('doctors.index')->with('success', 'Doctor supprimé avec succès!');
    }
}
