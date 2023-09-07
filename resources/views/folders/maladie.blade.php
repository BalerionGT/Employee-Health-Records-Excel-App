@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Dossiers de maladie') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                                <fieldset>
                                <div>
                                    <input type="checkbox" id="totalité" name="totalité"/>
                                    <label for="totalité">Tous les dossiers</label>
                            
                                    <input type="checkbox" id="solde" name="solde"/>
                                    <label for="solde">Dossier soldé</label>
                            
                                    <input type="checkbox" id="courant" name="courant"/>
                                    <label for="courant">Dossier courant</label>
                                </div>
                                <div>
                                    <button class="btn btn-success" id="confirmer">Confirmer</button>
                                </div>
                                </fieldset>
                        </div>
                        <div class="container mt-3" style="overflow: auto;">
                            <table id="maladie" class="table table-hover">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col">Matricule</th>
                                        <th scope="col">Prénom malade</th>
                                        <th scope="col">Date visite</th>
                                        <th scope="col">Frais medecin</th>
                                        <th scope="col">Frais Analyse</th>
                                        <th scope="col">Frais Pharmacie</th>
                                        <th scope="col">Frais Radio</th>
                                        <th scope="col">Frais Optique</th>
                                        <th scope="col">Frais S.Dentaire</th>
                                        <th scope="col">Prothèse</th>
                                        <th scope="col">Autres</th>
                                        <th scope="col">Observations</th>
                                        <th scope="col">N° Envoie</th>
                                        <th scope="col">Adherent</th>
                                        <th scope="col">Lien Parenté</th>
                                        <th scope="col">Mt total</th>
                                        <th scope="col">Solde</th>
                                        <th scope="col">Mt rembours</th>
                                        <th scope="col">Part Adherent</th>
                                        <th scope="col">Part Medecin1</th>
                                        <th scope="col">Part Medecin2</th>
                                        <th scope="col">PreAssure</th>
                                        <th scope="col">N° Reception</th>
                                        <th scope="col">Mois Règlement</th>
                                        <th scope="col">Code Personne</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subfolders as $subfolder)
                                    <tr>
                                        <td>{{$subfolder->matricule}}</td>
                                        <td>{{$subfolder->malade}}</td>
                                        <td>{{$subfolder->date_visite}}</td>
                                        <td>@php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                            if ($element) {
                                               $code = isset($element->visite) ? $element->visite : 0;
                                               echo $code;
                                               }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                            if ($element) {
                                               $code = isset($element->analyse) ? $element->analyse : 0;
                                               echo $code;
                                               }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                            if ($element) {
                                               $code = isset($element->pharmacie) ? $element->pharmacie : 0;
                                               echo $code;
                                               }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                            if ($element) {
                                               $code = isset($element->radio) ? $element->radio : 0;
                                               echo $code;
                                               }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                            if ($element) {
                                               $code = isset($element->optique) ? $element->optique : 0;
                                               echo $code;
                                               }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                            if ($element) {
                                               $code = isset($element->soin_dentaires) ? $element->soin_dentaires : 0;
                                               echo $code;
                                               }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                            if ($element) {
                                               $code = isset($element->prothèse) ? $element->prothèse : 0;
                                               echo $code;
                                               }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                            if ($element) {
                                               $code = isset($element->autres) ? $element->autres : 0;
                                               echo $code;
                                               }
                                            @endphp
                                        </td>
                                        <td>{{$subfolder->observations}}</td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subenvoies')
                                                ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();
                                            if ($element) {
                                               $id = $element->id_Envoie;

                                               $id_envoie = DB::table('envoies')
                                               ->where('id',$id)
                                               ->first();
                                               if($id_envoie){
                                                    $result = $id_envoie->num_envoie;
                                                    echo $result;
                                               }
                                            }
                                            @endphp
                                        </td>
                                        <td>{{$subfolder->adherent_nom}}</td>
                                        <td>{{$subfolder->lien}}</td>
                                        <td>{{$subfolder->montant_totale}}</td>
                                        <td>{{ $subfolder->solde === 1 ? 'Oui' : 'Non' }}</td>
                                        <td>{{$subfolder->montant_rembourse}}</td>
                                        <td>{{$subfolder->part_adherent}}</td>
                                        <td>{{$subfolder->part_medecin1}}</td>
                                        <td>{{$subfolder->part_medecin2}}</td>
                                        <td>{{$subfolder->adherent_prenom}}</td>
                                        <td>
                                            @php
                                                $id = $subfolder->id_Reception;
                                                $num = DB::table('receptions')
                                                          ->where('id', $id)
                                                          ->first(); // Use 'first()' to retrieve a single row
                                        
                                                if ($num) {
                                                    echo $num->num_recu;
                                                }
                                            @endphp
                                        </td>                                        
                                        <td>
                                            @php
                                                $solde = $subfolder->solde;
                                                if($solde){
                                                    $date = $subfolder->created_at;
                                                    $formatedDate = $date->format('F Y');
                                                    echo $formatedDate;
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                $parts = explode(' - ', $subfolder->malade);
                                                $code = isset($parts[1]) ? $parts[1] : 0;
                                                echo $code;
                                            @endphp
                                        </td>                                                                           
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const confirmerButton = document.getElementById("confirmer");
            const totalitéRadio = document.getElementById("totalité");
            const soldeRadio = document.getElementById("solde");
            const courantRadio = document.getElementById("courant");
            const rows = document.querySelectorAll("#maladie tbody tr");
    
            confirmerButton.addEventListener("click", function () {
                rows.forEach(row => {
                    const soldeCell = row.querySelector("td:nth-child(17)"); // Change this index to the correct one
                    const solde = soldeCell.textContent.trim();
    
                    if (totalitéRadio.checked) {
                        row.style.display = "table-row";
                    } else if (soldeRadio.checked) {
                        row.style.display = solde === "Oui" ? "table-row" : "none";
                    } else if (courantRadio.checked) {
                        row.style.display = solde === "Non" ? "table-row" : "none";
                    }
                });
            });
        });
    </script>
    
@include('layouts.footers.auth')
</div>
@endsection