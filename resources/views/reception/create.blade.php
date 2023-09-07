@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Nouveau dossier de réception') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="dataForm">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Information du dossier de réception') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                            <!-- row dossier d'envoie--> 
                            <div class="row d-flex justify-content-center align-items-center border">
                                <!--id-->
                                <input type="hidden" name="id" id="input-id">
                                <!-- Numéro de réception -->
                                <div class="col-2">
                                <div class="form-group{{ $errors->has('num_recu') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-num_recu">{{ __('Numéro de réception') }}</label>
                                    <input type="text" name="num_recu" id="input-num_recu" class="form-control form-control-alternative{{ $errors->has('num_recu') ? ' is-invalid' : '' }}" placeholder="{{ __('Numéro de réception') }}" required autofocus>

                                    @if ($errors->has('num_recu'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('num_recu') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Date de réception -->
                                <div class="col-2">
                                <div class="form-group{{ $errors->has('date_reception') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-date_reception">{{ __('Date de réception') }}</label>
                                    <input type="date" name="date_reception" id="input-date_reception" class="form-control form-control-alternative{{ $errors->has('date_reception') ? ' is-invalid' : '' }}" placeholder="{{ __('Date de réception') }}" value="<?php echo date('Y-m-d'); ?>" required>

                                    @if ($errors->has('date_reception'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_reception') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- N° Chèque -->
                                <div class="col-2">
                                <div class="form-group{{ $errors->has('num_cheque') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-num_cheque">{{ __('N° Chèque') }}</label>
                                    <input type="text" name="num_cheque" id="input-num_cheque" class="form-control form-control-alternative{{ $errors->has('num_cheque') ? ' is-invalid' : '' }}" placeholder="{{ __('N° Chèque') }}" required>
    
                                     @if ($errors->has('num_cheque'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('num_cheque') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Dossier remboursé -->
                                <div class="col-3">
                                    <div class="form-group{{ $errors->has('dossier_rembourse') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-dossier_rembourse">{{ __('Doss.Remboursé') }}</label>
                                        <input type="text" name="dossier_rembourse" id="input-dossier_rembourse" class="form-control form-control-alternative{{ $errors->has('dossier_rembourse') ? ' is-invalid' : '' }}" placeholder="{{ __('Doss.Remboursé') }}" required>
        
                                         @if ($errors->has('dossier_rembourse'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dossier_rembourse') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Montant total remboursé -->
                                <div class="col-3">
                                    <div class="form-group{{ $errors->has('montant_total') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-montant_total">{{ __('Montant total remboursé') }}</label>
                                        <input type="text" name="montant_total" id="input-montant_total" class="form-control form-control-alternative{{ $errors->has('montant_total') ? ' is-invalid' : '' }}" placeholder="{{ __('Montant total remboursé') }}" required>
        
                                         @if ($errors->has('montant_total'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('montant_total') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            </div>

                            <script>
                                function createFolder(numeroRecu,numeroCheque,dateRecu) {
                                $.ajax({
                                    type: 'POST',
                                    url: '/receptions', // Update with the correct URL
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    data: { num_recu: numeroRecu, num_cheque: numeroCheque, date_reception: dateRecu },
                                    success: function(response) {
                                        console.log('Main folder created successfully:', response);
                                        $('#input-num_recu').val(response.num_recu);
                                        $('#input-montant_total').val(response.montant_total);
                                        $('#input-dossier_rembourse').val(response.dossier_rembourse);
                                        $('#input-id').val(response.id);
                                    },
                                    error: function(error) {
                                        console.error('Error creating main folder:', error);
                                    }
                                });
                            }

                            $(document).ready(function() {
                                $('#input-num_cheque').keydown(function(event) {
                                    if (event.keyCode === 13) { // 13 is the keycode for the Enter key
                                        event.preventDefault(); // Prevent the form submission
                                        var numeroRecu = $('#input-num_recu').val();
                                        var numeroCheque = $(this).val();
                                        var dateRecu = $('#input-date_reception').val();
                                        createFolder(numeroRecu,numeroCheque,dateRecu);
                                    }
                                });
                            });
                            </script>
                        
                            <h6 class="heading-small text-muted mb-4">{{ __('Information des dossiers') }}</h6>

                            <!-- Les dossiers du dossier d'envoie -->
                            <div class="container border">
                                <!-- first row -->
                                <div class="row d-flex justify-content-center align-items-center">

                                    <!-- Matricule -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('matricule') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-matricule">{{ __('Matricule') }}</label>
                                            <input type="text" name="matricule" id="input-matricule" class="form-control form-control-alternative{{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('Matricule') }}" required>
            
                                             @if ($errors->has('matricule'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('matricule') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <dialog id="Dialog">
                                          <table class="table table-hover">
                                            <thead>
                                                <tr class="table-success">
                                                    <th scope="col">Matricule</th>
                                                    <th scope="col">N° envoie</th>
                                                    <th scope="col">Date visite</th>
                                                    <th scope="col">Nom adhérent</th>
                                                    <th scope="col">Prénom adhérent</th>                            
                                                    <th scope="col">Prénom Malade</th>
                                                    <th scope="col">Lien</th>
                                                    <th scope="col">Mt total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="input-body">

                                            </tbody>
                                          </table>
                                          <button id="hide" class="btn btn-success mt-4">Fermer la boîte de dialogue</button>
                                        </dialog>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            var dialogue = document.getElementById('Dialog');
                                            $('#input-matricule').keydown(function(event){
                                                if(event.keyCode === 13){
                                                    event.preventDefault();
                                                    dialogue.show();
                                                    findsubfolders($(this).val());
                                                    
                                                }
                                                else{
                                                    dialogue.close();
                                                }
                                            });
                                            document.getElementById("hide").onclick = function(){dialogue.close();};
                                        });
                                        function inputmodify(DateVisite, Nom, Prenom,Lien, Malade, MontantTotale, Remboursement){
                                            $('#input-date_visite').val(DateVisite);
                                            $('#input-adherent_nom').val(Nom);
                                            $('#input-adherent_prenom').val(Prenom)
                                            $('#input-lien').val(Lien);
                                            $('#input-malade').val(Malade);
                                            $('#input-montant_totale').val(MontantTotale);
                                            $('#input-remboursement_pevu').val(Remboursement);
                                            $('#input-observations').val('accorder');
                                        }

                                        function findsubfolders(matricule){
                                            $.ajax({
                                                    type: 'GET',
                                                    url: '/get-subfolders/' + matricule,
                                                    success: function(response) {
                                                        var data = response.data;
                                                        var html = ''; // Initialize an empty string to hold the HTML content
                                                        $('#input-body').empty();
                                                        for (var i = 0; i < data.length; i++) {
                                                            html += '<tr>' +
                                                                '<td>' + data[i].matricule + '</td>' +
                                                                '<td>' + data[i].num_envoie + '</td>' +
                                                                '<td>' + data[i].date_visite + '</td>' +
                                                                '<td>' + data[i].adherent_nom + '</td>' +
                                                                '<td>' + data[i].adherent_prenom + '</td>' +
                                                                '<td>' + data[i].malade + '</td>' +
                                                                '<td>' + data[i].lien + '</td>' +
                                                                '<td>' + data[i].montant_totale + '</td>' +
                                                                '</tr>';
                                                        }

                                                        // Append the constructed HTML to the table body
                                                        $('#input-body').append(html);
                                                        $('#input-body').on('click', 'tr', function(event) {
                                                                // Get the index of the clicked row
                                                                var rowIndex = $(event.currentTarget).index();
                                                                
                                                                
                                                                // Call inputmodify with data from the clicked row
                                                                inputmodify(
                                                                    data[rowIndex].date_visite,
                                                                    data[rowIndex].adherent_nom,
                                                                    data[rowIndex].adherent_prenom,
                                                                    data[rowIndex].lien,
                                                                    data[rowIndex].malade,
                                                                    data[rowIndex].montant_totale,
                                                                    data[rowIndex].montant_totale*0.8 // 80% of montant_totale
                                                                );
                                                            });
                                                    },
                                                    error: function(error) {
                                                        console.error('Error fetching subfolders:', error);
                                                    }
                                                });
                                        }
                                    </script>
                                    <!-- Date visite -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('date_visite') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-date_visite">{{ __('Date visite') }}</label>
                                            <input type="date" name="date_visite" id="input-date_visite" class="form-control form-control-alternative{{ $errors->has('date_visite') ? ' is-invalid' : '' }}" placeholder="{{ __('Date visite') }}" required>
            
                                             @if ($errors->has('date_visite'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('date_visite') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Adhérent -->
                                    <div class="col-4">
                                        <div class="wrapper">
                                        <div class="form-group{{ $errors->has('adherent_nom') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-adherent_nom">{{ __('Adhérent') }}</label>
                                            <input type="text" name="adherent_nom" id="input-adherent_nom" class="form-control form-control-alternative{{ $errors->has('adherent_nom') ? ' is-invalid' : '' }}" required readonly>
            
                                             @if ($errors->has('adherent_nom'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('adherent_nom') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('adherent_prenom') ? ' has-danger' : '' }}">
                                            <input type="text" name="adherent_prenom" id="input-adherent_prenom" class="form-control form-control-alternative{{ $errors->has('adherent_prenom') ? ' is-invalid' : '' }}" required readonly>
            
                                             @if ($errors->has('adherent_prenom'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('adherent_prenom') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Second row -->
                                <div class="row d-flex justify-content-center align-items-center">

                                    <!-- Lien de parenté -->
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('lien') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-lien">{{ __('Lien de parenté') }}</label>
                                            <input type="text" name="lien" id="input-lien" class="form-control form-control-alternative{{ $errors->has('lien') ? ' is-invalid' : '' }}" placeholder="{{ __('Lien de parenté') }}" required>
            
                                             @if ($errors->has('lien'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lien') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Prénom malade -->
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('malade') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-malade">{{ __('Prénom malade') }}</label>
                                            <input type="text" name="malade" id="input-malade" class="form-control form-control-alternative{{ $errors->has('malade') ? ' is-invalid' : '' }}" placeholder="{{ __('Prénom malade') }}" required readonly>
            
                                             @if ($errors->has('malade'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('malade') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <h6 class="heading-small text-muted mb-4">{{ __('Les frais engagées') }}</h6>

                            <!-- les frais engages -->
                            <div class="container border">
                                <!-- first row -->
                                <div class="row d-flex justify-content-center align-items-center">

                                    <!-- Montant total -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('montant_totale') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-montant_totale">{{ __('Montant totale') }}</label>
                                            <input type="text" name="montant_totale" id="input-montant_totale" class="form-control form-control-alternative{{ $errors->has('montant_totale') ? ' is-invalid' : '' }}" placeholder="{{ __('Montant totale') }}" required>
            
                                             @if ($errors->has('montant_totale'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('montant_totale') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Rembours.Prévu -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('remboursement_pevu') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-remboursement_pevu">{{ __('Rembours.Prévu') }}</label>
                                            <input type="text" name="remboursement_pevu" id="input-remboursement_pevu" class="form-control form-control-alternative{{ $errors->has('remboursement_pevu') ? ' is-invalid' : '' }}" placeholder="{{ __('Rembours.Prévu') }}" required>
            
                                             @if ($errors->has('remboursement_pevu'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('remboursement_pevu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- solde -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('solde') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-solde">{{ __('Solde') }}</label>
                                            <input type="solde" name="solde" id="input-solde" class="form-control form-control-alternative{{ $errors->has('solde') ? ' is-invalid' : '' }}" placeholder="{{ __('Solde') }}" value="Oui" required>
            
                                             @if ($errors->has('solde'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('solde') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- second row -->

                                <div class="row d-flex justify-content-center align-items-center">

                                    <!-- Observation -->
                                    <div class="col-8">
                                        <div class="form-group{{ $errors->has('observations') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-observations">{{ __('Observation') }}</label>
                                            <input type="text" name="observations" id="input-observations" class="form-control form-control-alternative{{ $errors->has('observations') ? ' is-invalid' : '' }}" placeholder="{{ __('Observation') }}" required>
            
                                             @if ($errors->has('observations'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('observations') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>  <!-- div du container -->

                            <h6 class="heading-small text-muted mb-4">{{ __('Remboursements') }}</h6>

                            <!-- Remboursements -->
                            <div class="container border">
                                <!-- first row -->
                                <div class="row d-flex justify-content-center align-items-center">

                                    <!-- Montant remboursé -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('montant_rembourse') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-montant_rembourse">{{ __('Montant remboursé') }}</label>
                                            <input type="text" name="montant_rembourse" id="input-montant_rembourse" class="form-control form-control-alternative{{ $errors->has('montant_rembourse') ? ' is-invalid' : '' }}" placeholder="{{ __('Montant remboursé') }}" required>
            
                                             @if ($errors->has('montant_rembourse'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('montant_rembourse') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Part Adhérent -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('part_adherent') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-part_adherent">{{ __('Part adhérent') }}</label>
                                            <input type="text" name="part_adherent" id="input-part_adherent" class="form-control form-control-alternative{{ $errors->has('part_adherent') ? ' is-invalid' : '' }}" placeholder="{{ __('Part adhérent') }}" required>
            
                                             @if ($errors->has('part_adherent'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('part_adherent') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!--Part médecin 1 -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('part_medecin1') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Part médecin 1') }}</label>
                                            <input type="text" name="part_medecin1" id="input-part_medecin1" class="form-control form-control-alternative{{ $errors->has('part_medecin1') ? ' is-invalid' : '' }}" placeholder="{{ __('Part médecin 1') }}" required>
            
                                             @if ($errors->has('part_medecin1'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('part_medecin1') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <!-- second row -->
                                <div class="row d-flex justify-content-center align-items-center">

                                    <!-- Part médecin 2 -->
                                    <div class="col-4 ">
                                        <div class="form-group{{ $errors->has('part_medecin2') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-part_medecin2">{{ __('Part médecin 2') }}</label>
                                            <input type="text" name="part_medecin2" id="input-part_medecin2" class="form-control form-control-alternative{{ $errors->has('part_medecin2') ? ' is-invalid' : '' }}" placeholder="{{ __('Part médecin 2') }}" required>
            
                                             @if ($errors->has('part_medecin2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('part_medecin2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>  <!-- div du container -->

                            <!-- ligne des boutons -->
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" id="btnSubmit" class="btn btn-success mt-4">{{ __('Enregistrer') }}</button>
                                </div>

                                <div class="col text-center">
                                    <button type="reset" class="btn btn-danger mt-4">{{ __('Annuler') }}</button>
                                </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {        
                    $('#btnSubmit').on("click", function() {
                            var id = $('#input-id').val();
                            var dossierRembourse = $('#input-dossier_rembourse').val();
                            var montantTotalRembourse = $('#input-montant_total').val();
                            var montantRembourse = $('#input-montant_totale').val();
                            updatefolder(id, dossierRembourse, montantRembourse, montantTotalRembourse);
                      });
                });
        
                function updatefolder(id, dossierRembourse, montantRembourse, montantTotalRembourse) {
                            $.ajax({
                                type: 'PATCH',
                                url: '/receptions/' + id,
                                contentType: 'application/json',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: JSON.stringify({
                                    dossier_rembourse: dossierRembourse,
                                    montant_total: montantTotalRembourse,
                                    montant_totale: montantRembourse,
                                    id: id
                                }),
                                success: function(response) {
                                    if (response.success) {
                                        $('#input-dossier_rembourse').val(response.data.dossier_rembourse);
                                        $('#input-montant_total').val(response.data.montant_total);
                                        $('#input-montant_totale').val(response.data.montant_totale);
                                        $('#input-id').val(response.data.id);
                                    }
                                },
                                error: function(error) {
                                    console.error('Error updating folder data:', error);
                                }
                                });
                            }

                $(document).ready(function() {
                    $('#dataForm').submit(function(event) {
                        event.preventDefault(); // Prevent default form submission
                        var formData = {
                            id: $('#input-id').val(),
                            matricule: $('#input-matricule').val(),
                            date_visite: $('#input-date_visite').val(),
                            adherent_nom: $('#input-adherent_nom').val(),
                            adherent_prenom: $('#input-adherent_prenom').val(),
                            lien: $('#input-lien').val(),
                            malade: $('#input-malade').val(),
                            visite: $('#input-visite').val(),
                            part_medecin2: $('#input-part_medecin2').val(),
                            part_medecin1: $('#input-part_medecin1').val(),
                            montant_rembourse: $('#input-montant_rembourse').val(),
                            solde: $('#input-solde').val(),
                            remboursement_pevu: $('#input-remboursement_pevu').val(),
                            part_adherent: $('#input-part_adherent').val(),
                            observations: $('#input-observations').val(),
                            montant_totale: $('#input-montant_totale').val()
                        };
                        // Perform AJAX request
                        $.ajax({
                            type: 'POST',
                            url: '/subreceptions', // Replace with your server endpoint
                            contentType: 'application/json',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: JSON.stringify(formData),
                            success: function(response) {
                                // Handle success (update UI, show messages, etc.)
                                console.log('Subfolder created:', response);
                                $('#input-matricule').val('');
                                $('#input-date_visite').val('');
                                $('#input-adherent_nom').val('');
                                $('#input-adherent_prenom').val('');
                                $('#input-lien').val('');
                                $('#input-malade').val('');
                                $('#input-visite').val('');
                                $('#input-part_medecin2').val('');
                                $('#input-part_medecin1').val('');
                                $('#input-montant_rembourse').val('');
                                $('#input-remboursement_pevu').val('');
                                $('#input-observations').val('');
                                $('#input-montant_totale').val('0');
                                $('#input-part_adherent').val('');
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                // Handle error (show error messages, etc.)
                                console.error('AJAX Error:', errorThrown);
                            }
                        });
                    });

                });
            </script>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection