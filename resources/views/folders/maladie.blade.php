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
                        <div class="row">
                            <div class="col-4">
                                <label class="form-control-label" for="input-matricule">{{ __('Matricule') }}</label>
                                <input type="text" name="debut" id="input-matricule" class="form-control form-control-alternative{{ $errors->has('matricule') ? ' is-invalid' : '' }}" required autofocus>
                                @if ($errors->has('matricule'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('matricule') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-6">
                                <label class="form-control-label" for="input-adherent">{{ __('Nom_prénom') }}</label>
                                <input type="text" name="adherent" id="input-adherent" class="form-control form-control-alternative{{ $errors->has('adherent') ? ' is-invalid' : '' }}" required autofocus>
                                @if ($errors->has('adherent'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adherent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                                <div class="col-3">
                                    <label class="form-control-label" for="input-debut">{{ __('Exercice de début') }}</label>
                                    <input type="text" name="debut" id="input-debut" class="form-control form-control-alternative{{ $errors->has('debut') ? ' is-invalid' : '' }}" required autofocus>
                                    @if ($errors->has('debut'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('debut') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-3">
                                        <label class="form-control-label" for="input-fin">{{ __('Exercice de fin') }}</label>
                                        <input type="text" name="fin" id="input-fin" class="form-control form-control-alternative{{ $errors->has('fin') ? ' is-invalid' : '' }}" required autofocus>
                                        @if ($errors->has('fin'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('fin') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <fieldset>
                                <div class="mt-5">
                                    <input type="checkbox" id="totalité" name="totalité"/>
                                    <label for="totalité">Tous les dossiers</label>
                            
                                    <input type="checkbox" id="solde" name="solde"/>
                                    <label for="solde">Dossier soldé</label>
                            
                                    <input type="checkbox" id="courant" name="courant"/>
                                    <label for="courant">Dossier courant</label>
                                </div>
                                </fieldset>
                            </div>
                            <div>
                                <button class="btn btn-success mt-4" id="confirmer">Confirmer</button>
                            </div>
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
                                        <td>{{$subfolder->visite}}</td>
                                        <td>{{$subfolder->analyse === null ? 0 : $subfolder->analyse}}</td>
                                        <td>{{$subfolder->pharmacie === null ? 0 : $subfolder->pharmacie}}</td>
                                        <td>{{$subfolder->radio === null ? 0 : $subfolder->radio}}</td>
                                        <td>{{$subfolder->optique === null ? 0 : $subfolder->optique}}</td>
                                        <td>{{$subfolder->soin_dentaires === null ? 0 : $subfolder->soin_dentaires}}</td>
                                        <td>{{$subfolder->prothèse === null ? 0 : $subfolder->prothèse}}</td>
                                        <td>{{$subfolder->autres === null ? 0 : $subfolder->autres}}</td>

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
                                        <td>
                                            @php
                                                $matricule = $subfolder->matricule;
                                                $date_visite = $subfolder->date_visite;
                                                $malade = $subfolder->malade;
                                                $element = DB::table('subreceptions')
                                                    ->where('matricule', $matricule)
                                                ->where('date_visite',$date_visite)
                                                ->where('malade',$malade)
                                                ->first();

                                                if ($element) {
                                                $code = $element->montant_rembourse;
                                                echo $code;
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subreceptions')
                                            ->where('matricule', $matricule)
                                            ->where('date_visite',$date_visite)
                                            ->where('malade',$malade)
                                            ->first();

                                            if ($element) {
                                            $code = $element->part_adherent;
                                            echo $code;
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subreceptions')
                                            ->where('matricule', $matricule)
                                            ->where('date_visite',$date_visite)
                                            ->where('malade',$malade)
                                            ->first();

                                            if ($element) {
                                            $code = $element->part_medecin1;
                                            echo $code;
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            $element = DB::table('subreceptions')
                                            ->where('matricule', $matricule)
                                            ->where('date_visite',$date_visite)
                                            ->where('malade',$malade)
                                            ->first();

                                            if ($element) {
                                            $code = $element->part_medecin2;
                                            echo $code;
                                            }
                                            @endphp
                                        </td>
                                        <td>{{$subfolder->adherent_prenom}}</td>
                                        <td>
                                            @php
                                            $matricule = $subfolder->matricule;
                                            $date_visite = $subfolder->date_visite;
                                            $malade = $subfolder->malade;
                                            
                                            $element = DB::table('subreceptions')
                                            ->where('matricule', $matricule)
                                            ->where('date_visite',$date_visite)
                                            ->where('malade',$malade)
                                            ->first();
                                            if($element){
                                                $reception = DB::table('receptions')
                                                ->where('id',$element->id_Reception)
                                                ->first();
                                            }
                                            if ($reception) {
                                            $code = $reception->num_recu;
                                            echo $code;
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
    const anneeDebutInput = document.getElementById("input-debut");
    const anneeFinInput = document.getElementById("input-fin");
    const matriculeInput = document.getElementById("input-matricule");

    confirmerButton.addEventListener("click", function () {
        const anneeDebut = parseInt(anneeDebutInput.value);
        const anneeFin = parseInt(anneeFinInput.value);
        const matricule = matriculeInput.value;

        rows.forEach(row => {
            const soldeCell = row.querySelector("td:nth-child(17)"); // Change this index to the correct one
            const solde = soldeCell.textContent.trim();
            const dateVisiteCell = row.querySelector("td:nth-child(3)"); // Change X to the correct index of the date cell
            const dateVisite = new Date(dateVisiteCell.textContent.trim());
            const anneeVisite = dateVisite.getFullYear();
            const matriculeCell = row.querySelector("td:nth-child(1)"); // Change Y to the correct index of the matricule cell
            const matriculeLigne = matriculeCell.textContent.trim();

            if (
                (totalitéRadio.checked || 
                (soldeRadio.checked && solde === "Oui") || 
                (courantRadio.checked && solde === "Non")) && 
                (anneeVisite >= anneeDebut && anneeVisite <= anneeFin) &&
                (matricule === matriculeLigne)
            ) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    });
});
        
        $(document).ready(function(){
                $('#input-matricule').keydown(function(event) {
                    if (event.keyCode === 13) { // 13 is the keycode for the Enter key
                        event.preventDefault(); // Prevent the form submission
                        var matricule = $(this).val();
                        searchadherent(matricule);
                    }
        function searchadherent(matricule){
            $.ajax({
                type: 'GET',
                url: '/get-employee-data/' + matricule,
                success: function(response) {
                    if (response.success) {
                    $('#input-adherent').val(response.data.nom +' '+ response.data.prenom);
                    } else {
                        $('#input-adherent').val('');
                        console.error('Error fetching employee data:', response.message);
                    }
                },
                error: function(error) {
                    console.error('Error fetching employee data:', error);
                }
                });
                }
                });
                    });

    </script>
    
@include('layouts.footers.auth')
</div>
@endsection