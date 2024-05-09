<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('nom')->get();
        return view('users.show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "matricule"=>"required",
            "departement"=>"required",
            "sexe"=>"required",
            "date_naissance"=>"required",
            "date_recrutement"=>"required",
            "situation_famille"=>"required",

        ]);

        User::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "matricule"=>$request->matricule,
            "departement"=>$request->departement,
            "sexe"=>$request->sexe,
            "date_naissance"=>$request->date_naissance,
            "date_recrutement"=>$request->date_recrutement,
            "situation_famille"=>$request->situation_famille,
            "nbre_enfant"=>$request->nbre_enfant === null ? 0 : $request->nbre_enfant,
            "matricule_conjoint"=>$request->matricule_conjoint === null ? 0 : $request->matricule_conjoint,
            "validation" => $request->validation === "on" ? 1 : 0 ,
            "admin"=> 0
        ]);

        return back()->with("success","Utilisateur ajouté avec succès!");
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
        $user = User::where('id',$id)->first();
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id',$id)->first();
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "matricule"=>"required",
            "departement"=>"required",
            "sexe"=>"required",
            "date_naissance"=>"required",
            "date_recrutement"=>"required",
            "situation_famille"=>"required",

        ]);
        $user->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "matricule"=>$request->matricule,
            "departement"=>$request->departement,
            "sexe"=>$request->sexe,
            "date_naissance"=>$request->date_naissance,
            "date_recrutement"=>$request->date_recrutement,
            "situation_famille"=>$request->situation_famille,
            "nbre_enfant"=>$request->nbre_enfant === null ? 0 : $request->nbre_enfant,
            "matricule_conjoint"=>$request->matricule_conjoint === null ? 0 : $request->matricule_conjoint,
            "validation" => $request->validation === "on" ? 1 : 0, // Set validation based on the condition,
            "admin"=>0
        ]);
        return back()->with("success","Mise à jours de l'utilisateur avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return Redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès!');
    }

    public function getEmployeeData(string $matricule){

        $employee = User::where('matricule', $matricule)->first();

        if ($employee) {
            return response()->json([
                'success' => true,
                'data' => [
                    'nom' => $employee->nom,
                    'prenom' => $employee->prenom
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found'
            ]);
        }
    }

    public function getEmployeeChild(string $matricule){
        $employee = User::where('matricule', $matricule)->first(); 

        if ($employee) {
            $childrens = User::find($employee->id)->enfants;
            $childrens = $employee->enfants;
            $childrenData = [];
    
            foreach ($childrens as $child) {
                $childData = [
                    'prenom' => $child->prenom,
                    'code_assurance' => $child->code_assurance,
                ];
    
                $childrenData[] = $childData;
            }
    
            return response()->json([
                'success' => true,
                'data' => $childrenData,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found.',
            ]);
        }
    }

    public function getEmployeePartner(string $matricule){
        $employee = User::where('matricule', $matricule)->first(); 

        if ($employee) {
            $partners = User::find($employee->id)->conjoints;
            $partners = $employee->conjoints;
            $partnersData = [];
    
            foreach ($partners as $partner) {
                $partnerData = [
                    'prenom' => $partner->prenom,
                    'code_assurance' => $partner->code_assurance,
                ];
    
                $partnersData[] = $partnerData;
            }
    
            return response()->json([
                'success' => true,
                'data' => $partnersData,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found.',
            ]);
        }
    }

    public function getEmployeeLinks(string $matricule) {
        try {
            $employee = User::where('matricule', $matricule)->first();
            
            $employeeData = [
                'matricule' => $employee->matricule,
                'nom' => $employee->nom,
                'prenom' => $employee->prenom,
                'id'=> $employee->id
            ];
    
            $enfants = $employee->enfants;
            $conjoints = $employee->conjoints;
            
            $conjointsData = [];
            foreach ($conjoints as $conjoint) {
                $conjointsData[] = [
                    'id' => $conjoint->id,
                    'nom' => $conjoint->nom,
                    'prenom' => $conjoint->prenom,
                    'sexe' => $conjoint->sexe,
                    'date_naissance' => $conjoint->date_naissance,
                    'code_assurance' => $conjoint->code_assurance,
                    'date_debut_adherence' => $conjoint->date_debut_adherence,
                    'date_fin_adherence' => $conjoint->date_fin_adherence,
                    'validation' => $conjoint->validation,
                    'affil' => $conjoint->affil
                ];
            }
    
            $enfantsData = [];
            foreach ($enfants as $enfant) {
                $enfantsData[] = [
                    'id' => $enfant->id,
                    'nom' => $enfant->nom,
                    'prenom' => $enfant->prenom,
                    'sexe' => $enfant->sexe,
                    'date_naissance' => $enfant->date_naissance,
                    'code_assurance' => $enfant->code_assurance,
                    'date_debut_adherence' => $enfant->date_debut_adherence,
                    'date_fin_adherence' => $enfant->date_fin_adherence,
                    'validation' => $enfant->validation,
                    'affil' => $enfant->affil
                ];
            }
    
            return response()->json([
                'success' => true,
                'EmployeeData' => $employeeData,
                'EnfantsData' => $enfantsData,
                'ConjointsData' => $conjointsData
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found.',
            ]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ]);
        }
    }
    
}
