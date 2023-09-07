<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $nbre_adherent = DB::table('users')->count();
        $nbre_medecin = DB::table('doctors')->count();
        $nbre_envoie = DB::table('envoies')->count();
        $nbre_reception = DB::table('receptions')->count();

        $anneeActuelle = date('Y'); // Obtient l'année actuelle

        $moisDeLAnnee = range(1, 12);

        // Récupérez les dépenses des réceptions
        $receptionParMois = DB::table('receptions')
            ->selectRaw('MONTH(date_reception) as mois, SUM(montant_total) as total_montant_total')
            ->whereYear('date_reception', '=', $anneeActuelle)
            ->groupByRaw('MONTH(date_reception)')
            ->get();

        // Récupérez les dépenses des envoies
        $envoieParMois = DB::table('envoies')
            ->selectRaw('MONTH(date_envoie) as mois, SUM(montant_engage) as total_montant_engage')
            ->whereYear('date_envoie', '=', $anneeActuelle)
            ->groupByRaw('MONTH(date_envoie)')
            ->get();

        // Fusionnez les données de réceptions et d'envoies pour chaque mois
        $data1 = [];
        $data2 = [];
        foreach ($moisDeLAnnee as $mois) {
            $reception = $receptionParMois->firstWhere('mois', $mois);
            $envoie = $envoieParMois->firstWhere('mois', $mois);
            $data1 []= [
                'total_montant_engage' => $envoie ? $envoie->total_montant_engage : 0,
            ];
            $data2 []= [
                'total_montant_engage' => $reception ? $reception->total_montant_total : 0,
            ];
        }
        $CollectionData1 = collect($data1);
        $CollectionData2 = collect($data2);

        $departements = DB::table('users')
        ->select('departement', DB::raw('COUNT(*) as count'))
        ->groupBy('departement')
        ->get();
        return view('dashboard',compact('nbre_adherent','nbre_medecin','nbre_envoie','nbre_reception','departements','CollectionData1','CollectionData2'));
    } 
}
