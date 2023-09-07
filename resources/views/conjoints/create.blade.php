@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Nouveau conjoint & enfant') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>

                            <h6 class="heading-small text-muted mb-4">{{ __('Information de l\'adhérent') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                            <!-- row information de l'adhérent--> 
                            <div class="row d-flex justify-content-center align-items-center border">
                                <!--id-->
                                <input type="hidden" nom="id" id="input-id">
                                <!-- Matricule -->
                                <div class="col-3">
                                <div class="form-group{{ $errors->has('matricule') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-matricule">{{ __('Matricule') }}</label>
                                    <input type="text" name="matricule" id="input-matricule" class="form-control form-control-alternative{{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('Matricule') }}" required autofocus>

                                    @if ($errors->has('matricule'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('matricule') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Nom -->
                                <div class="col-3">
                                <div class="form-group{{ $errors->has('nom') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nom">{{ __('Nom') }}</label>
                                    <input type="text" name="nom" id="input-nom" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}">

                                    @if ($errors->has('nom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nom') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Prénom -->
                                <div class="col-3">
                                <div class="form-group{{ $errors->has('prenom') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-prenom">{{ __('Prénom') }}</label>
                                    <input type="text" name="prenom" id="input-prenom" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="{{ __('Prénom') }}">
    
                                     @if ($errors->has('prenom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prenom') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                            </div>
                            </div>

                            <h6 class="heading-small text-muted mb-4">{{ __('Information du conjoint') }}</h6>

                            <!-- les informations sur les enfants-->
                            <div class="container border">
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Sexe</th>
                                            <th>Dt_naissance</th>
                                            <th>Code d'assurance</th>
                                            <th>Dt_Début.Adh</th>
                                            <th>Dt_Fin.Adh</th>
                                            <th>Affil à</th>
                                            <th>Validé par assurance</th>
                                        </tr>
                                    </thead>
                                    <tbody id='body-conjoint'>
                                        <tr id='create-1'>
                                            <td><input type="text" name="nom" id="input-nom-create-1" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}" ></td>
                                            <td><input type="text" name="prenom" id="input-prenom-create-1" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}"  ></td>
                                            <td><select class="form-control form-control-alternative" name="sexe" id="input-sexe-create-1">
                                                <option value="M">M</option>
                                                <option value="F">F</option>
                                                <!-- Add more options as needed -->
                                              </select>
                                            </td>
                                            <td><input type="date" name="date_naissance" id="input-date_naissance-create-1" class="form-control form-control-alternative{{ $errors->has('date_naissance') ? ' is-invalid' : '' }}"  ></td>
                                            <td><input type="text" name="code_assurance" id="input-code_assurance-create-1" class="form-control form-control-alternative{{ $errors->has('code_assurance') ? ' is-invalid' : '' }}"  ></td>
                                            <td><input type="date" name="date_debut_adherence" id="input-date_debut_adherence-create-1" class="form-control form-control-alternative{{ $errors->has('date_debut_adherence') ? ' is-invalid' : '' }}"  ></td>
                                            <td><input type="date" name="date_fin_adherence" id="input-date_fin_adherence-create-1" class="form-control form-control-alternative{{ $errors->has('date_fin_adherence') ? ' is-invalid' : '' }}"  ></td>
                                            <td><input type="text" name="affil" id="input-affil-create-1" class="form-control form-control-alternative{{ $errors->has('affil') ? ' is-invalid' : '' }}"  ></td>
                                            <td><input type="text" name="validation" id="input-validation-create-1" class="form-control form-control-alternative{{ $errors->has('validation') ? ' is-invalid' : '' }}"  ></td>
                                        </tr>
                                        <tr id='create-2'>
                                            <td><input type="text" name="nom" id="input-nom-create-2" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="prenom" id="input-prenom-create-2" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}"></td>
                                            <td><select class="form-control form-control-alternative" name="sexe" id="input-sexe-create-2">
                                                <option value="M">M</option>
                                                <option value="F">F</option>
                                                <!-- Add more options as needed -->
                                              </select>
                                            </td>
                                            <td><input type="date" name="date_naissance" id="input-date_naissance-create-2" class="form-control form-control-alternative{{ $errors->has('date_naissance') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="code_assurance" id="input-code_assurance-create-2" class="form-control form-control-alternative{{ $errors->has('code_assurance') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="date" name="date_debut_adherence" id="input-date_debut_adherence-create-2" class="form-control form-control-alternative{{ $errors->has('date_debut_adherence') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="date" name="date_fin_adherence" id="input-date_fin_adherence-create-2" class="form-control form-control-alternative{{ $errors->has('date_fin_adherence') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="affil" id="input-affil-create-2" class="form-control form-control-alternative{{ $errors->has('affil') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="validation" id="input-validation-create-2" class="form-control form-control-alternative{{ $errors->has('validation') ? ' is-invalid' : '' }}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6 class="heading-small text-muted mb-4">{{ __('Information des enfants') }}</h6>

                            <!-- les informations sur les enfants -->
                            <div class="container border">
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Sexe</th>
                                            <th>Dt_naissance</th>
                                            <th>Code d'assurance</th>
                                            <th>Dt_Début.Adh</th>
                                            <th>Dt_Fin.Adh</th>
                                            <th>Affil à</th>
                                            <th>Validé par assurance</th>
                                        </tr>
                                    </thead>
                                    <tbody id='body-enfant'>
                                        <tr id='create-3'>
                                            <td><input type="text" name="nom" id="input-nom-create-3" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="prenom" id="input-prenom-create-3" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}"></td>
                                            <td><select class="form-control form-control-alternative" name="sexe" id="input-sexe-create-3">
                                                <option value="M">M</option>
                                                <option value="F">F</option>
                                                <!-- Add more options as needed -->
                                              </select>
                                            </td>
                                            <td><input type="date" name="date_naissance" id="input-date_naissance-create-3" class="form-control form-control-alternative{{ $errors->has('date_naissance') ? ' is-invalid' : '' }}"  ></td>
                                            <td><input type="text" name="code_assurance" id="input-code_assurance-create-3" class="form-control form-control-alternative{{ $errors->has('code_assurance') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="date" name="date_debut_adherence" id="input-date_debut_adherence-create-3" class="form-control form-control-alternative{{ $errors->has('date_debut_adherence') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="date" name="date_fin_adherence" id="input-date_fin_adherence-create-3" class="form-control form-control-alternative{{ $errors->has('date_fin_adherence') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="affil" id="input-affil-create-3" class="form-control form-control-alternative{{ $errors->has('affil') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="validation" id="input-validation-create-3" class="form-control form-control-alternative{{ $errors->has('validation') ? ' is-invalid' : '' }}"></td>
                                        </tr>
                                        <tr id='create-4'>
                                            <td><input type="text" name="nom" id="input-nom-create-4" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="prenom" id="input-prenom-create-4" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}"></td>
                                            <td><select class="form-control form-control-alternative" name="sexe" id="input-sexe-create-4">
                                                <option value="M">M</option>
                                                <option value="F">F</option>
                                                <!-- Add more options as needed -->
                                              </select>
                                            </td>
                                            <td><input type="date" name="date_naissance" id="input-date_naissance-create-4" class="form-control form-control-alternative{{ $errors->has('date_naissance') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="code_assurance" id="input-code_assurance-create-4" class="form-control form-control-alternative{{ $errors->has('code_assurance') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="date" name="date_debut_adherence" id="input-date_debut_adherence-create-4" class="form-control form-control-alternative{{ $errors->has('date_debut_adherence') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="date" name="date_fin_adherence" id="input-date_fin_adherence-create-4" class="form-control form-control-alternative{{ $errors->has('date_fin_adherence') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="affil" id="input-affil-create-4" class="form-control form-control-alternative{{ $errors->has('affil') ? ' is-invalid' : '' }}"></td>
                                            <td><input type="text" name="validation" id="input-validation-create-4" class="form-control form-control-alternative{{ $errors->has('validation') ? ' is-invalid' : '' }}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- third row ligne des boutons -->
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
                $(document).ready(function(){
                    $('#input-matricule').keydown(function(event) {
                        if (event.keyCode === 13) { // 13 is the keycode for the Enter key
                            event.preventDefault(); // Prevent the form submission
                            var matricule = $(this).val();
                            showUserLinks(matricule);
                        }
                })
                });
                function showUserLinks(matricule){
                    $.ajax({
                        type: 'GET',
                        url: '/get-employee-links/' + matricule,
                        success: function(response) {
                            if (response.success) {
                                $('#input-nom').val(response['EmployeeData']['nom']);
                                $('#input-prenom').val(response['EmployeeData']['prenom']);
                                $('#input-matricule').val(response['EmployeeData']['matricule']);
                                $('#input-id').val(response['EmployeeData']['id']);
                                var dataEnfant = response.EnfantsData;
                                var dataConjoint = response.ConjointsData;
                                var html1 = '';
                                var html2 = '';
                                for (var i = 0; i < dataEnfant.length; i++) {
                                    html1 += '<tr>' +
                                        '<td style="display: none;"><input type="hidden" name="id" id="input-id-' + i + '" class="form-control form-control-alternative{{ $errors->has('id') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['id'] + '" required></td>' +
                                        '<td><input type="text" name="nom" id="input-nom-' + i + '" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['nom'] + '" required></td>' +
                                        '<td><input type="text" name="prenom" id="input-prenom-' + i + '" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['prenom'] + '" required></td>' +
                                        '<td><select class="form-control form-control-alternative" name="sexe" id="input-sexe-' + i + '"value="' + dataEnfant[i]['sexe'] + '">' +
                                        '<option value="M">M</option>' +
                                        '<option value="F">F</option>' +
                                        '</select></td>' +
                                        '<td><input type="date" name="date_naissance" id="input-date_naissance-' + i + '" class="form-control form-control-alternative{{ $errors->has('date_naissance') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['date_naissance'] + '" required></td>' +
                                        '<td><input type="text" name="code_assurance" id="input-code_assurance-' + i + '" class="form-control form-control-alternative{{ $errors->has('code_assurance') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['code_assurance'] + '" required></td>' +
                                        '<td><input type="date" name="date_debut_adherence" id="input-date_debut_adherence-' + i + '" class="form-control form-control-alternative{{ $errors->has('date_debut_adherence') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['date_debut_adherence'] + '" required></td>' +
                                        '<td><input type="date" name="date_fin_adherence" id="input-date_fin_adherence-' + i + '" class="form-control form-control-alternative{{ $errors->has('date_fin_adherence') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['date_fin_adherence'] + '" required></td>' +
                                        '<td><input type="text" name="affil" id="input-affil-' + i + '" class="form-control form-control-alternative{{ $errors->has('affil') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['affil'] + '" required></td>' +
                                        '<td><input type="text" name="validation" id="input-validation-' + i + '" class="form-control form-control-alternative{{ $errors->has('validation') ? ' is-invalid' : '' }}" value="' + dataEnfant[i]['validation'] + '" required></td>' +
                                    '</tr>';
                                }
                                $("#body-enfant").prepend(html1);

                                for (var i = 0; i < dataConjoint.length; i++) {
                                    html2 += '<tr>' +
                                        '<td style="display: none;"><input type="hidden" name="id" id="input-id-' + i + '" class="form-control form-control-alternative{{ $errors->has('id') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['id'] + '" required></td>' +
                                        '<td><input type="text" name="nom" id="input-nom-' + i + '" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['nom'] + '" required></td>' +
                                        '<td><input type="text" name="prenom" id="input-prenom-' + i + '" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['prenom'] + '" required></td>' +
                                        '<td><select class="form-control form-control-alternative" name="sexe" id="input-sexe-' + i + '" value="' + dataConjoint[i]['sexe'] + '">' +
                                        '<option value="M">M</option>' +
                                        '<option value="F">F</option>' +
                                        '</select></td>' +
                                        '<td><input type="date" name="date_naissance" id="input-date_naissance-' + i + '" class="form-control form-control-alternative{{ $errors->has('date_naissance') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['date_naissance'] + '" required></td>' +
                                        '<td><input type="text" name="code_assurance" id="input-code_assurance-' + i + '" class="form-control form-control-alternative{{ $errors->has('code_assurance') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['code_assurance'] + '" required></td>' +
                                        '<td><input type="date" name="date_debut_adherence" id="input-date_debut_adherence-' + i + '" class="form-control form-control-alternative{{ $errors->has('date_debut_adherence') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['date_debut_adherence'] + '" required></td>' +
                                        '<td><input type="date" name="date_fin_adherence" id="input-date_fin_adherence-' + i + '" class="form-control form-control-alternative{{ $errors->has('date_fin_adherence') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['date_fin_adherence'] + '" required></td>' +
                                        '<td><input type="text" name="affil" id="input-affil-' + i + '" class="form-control form-control-alternative{{ $errors->has('affil') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['affil'] + '" required></td>' +
                                        '<td><input type="text" name="validation" id="input-validation-' + i + '" class="form-control form-control-alternative{{ $errors->has('validation') ? ' is-invalid' : '' }}" value="' + dataConjoint[i]['validation'] + '" required></td>' +
                                    '</tr>';
                                }
                                $("#body-conjoint").prepend(html2);
                           }
                        },
                        error: function(error) {
                            console.error('Error fetching employee data:', error);
                        }
                    });
                }
                $(document).ready(function(){
                    $('#btnSubmit').on("click",function(event){
                        event.preventDefault();
                        var row1 = $('#create-1');
                        var row2 = $('#create-2');
                        var row3 = $('#create-3');
                        var row4 = $('#create-4');
                        var inputsrow1 = row1.find('input, select'); // Find inputs and selects within the first row
                        var inputsrow2 = row2.find('input, select'); // Find inputs and selects within the second row
                        var inputsrow3 = row3.find('input, select'); // Find inputs and selects within the first row
                        var inputsrow4 = row4.find('input, select'); // Find inputs and selects within the second row
                        var emptyFound = false;
                        inputsrow1.each(function() {
                            if ($(this).val() === '') {
                                emptyFound = true;
                                return false; // Exit the loop if an empty input is found in the row
                            }
                            });
                            if (!emptyFound) {
                                creatConjoint($('#input-id').val(),$('#input-nom-create-1').val(),$('#input-prenom-create-1').val(),$('#input-sexe-create-1').val(),$('#input-date_naissance-create-1').val(),$('#input-code_assurance-create-1').val(),$('#input-date_debut_adherence-create-1').val(),$('#input-date_fin_adherence-create-1').val(),$('#input-affil-create-1').val(),$('#input-validation-create-1').val());
                            } 

                            emptyFound = false; // Reset the flag for the second row
                        
                        inputsrow2.each(function() {
                            if ($(this).val() === '') {
                                emptyFound = true;
                                return false; // Exit the loop if an empty input is found in the row
                            }
                            });

                            if (!emptyFound) {
                                creatConjoint($('#input-id').val(),$('#input-nom-create-2').val(),$('#input-prenom-create-2').val(),$('#input-sexe-create-2').val(),$('#input-date_naissance-create-2').val(),$('#input-code_assurance-create-2').val(),$('#input-date_debut_adherence-create-2').val(),$('#input-date_fin_adherence-create-2').val(),$('#input-affil-create-2').val(),$('#input-validation-create-2').val());
                            } 


                            emptyFound = false; // Reset the flag for the second row
                        
                        inputsrow3.each(function() {
                            if ($(this).val() === '') {
                                emptyFound = true;
                                return false; // Exit the loop if an empty input is found in the row
                            }
                            });

                            if (!emptyFound) {
                                creatEnfant($('#input-id').val(),$('#input-nom-create-3').val(),$('#input-prenom-create-3').val(),$('#input-sexe-create-3').val(),$('#input-date_naissance-create-3').val(),$('#input-code_assurance-create-3').val(),$('#input-date_debut_adherence-create-3').val(),$('#input-date_fin_adherence-create-3').val(),$('#input-affil-create-3').val(),$('#input-validation-create-3').val());
                            } 
                            emptyFound = false; // Reset the flag for the second row
                        
                        inputsrow4.each(function() {
                            if ($(this).val() === '') {
                                emptyFound = true;
                                return false; // Exit the loop if an empty input is found in the row
                            }
                            });

                            if (!emptyFound) {
                                creatEnfant($('#input-id').val(),$('#input-nom-create-4').val(),$('#input-prenom-create-4').val(),$('#input-sexe-create-4').val(),$('#input-date_naissance-create-4').val(),$('#input-code_assurance-create-4').val(),$('#input-date_debut_adherence-create-4').val(),$('#input-date_fin_adherence-create-4').val(),$('#input-affil-create-4').val(),$('#input-validation-create-4').val());
                            } 
                            emptyFound = false;
                        })
                });
                function creatConjoint(id,nom,prenom,sexe,date_naissance,code_assurance,date_debut_adherence,date_fin_adherence,affil,validation){
                    $.ajax({
                        type: 'POST',
                        url: '/conjoints/',
                        contentType: 'application/json',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: JSON.stringify({
                            id : id,
                            nom : nom,
                            prenom : prenom,
                            sexe :sexe,
                            date_naissance : date_naissance,
                            code_assurance : code_assurance,
                            date_debut_adherence : date_debut_adherence,
                            date_fin_adherence : date_fin_adherence,
                            affil : affil,
                            validation : validation
                        }),
                        success: function(response) {
                            if (response.success) {
                                console.log('conjoint created succefuly');
                            }
                        },
                        error: function(error) {
                            console.error('Error updating folder data:', error);
                        }
                })
                };
                function creatEnfant(id,nom,prenom,sexe,date_naissance,code_assurance,date_debut_adherence,date_fin_adherence,affil,validation){
                    $.ajax({
                        type: 'POST',
                        url: '/enfants/',
                        contentType: 'application/json',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: JSON.stringify({
                            id : id,
                            nom : nom,
                            prenom : prenom,
                            sexe : sexe,
                            date_naissance : date_naissance,
                            code_assurance : code_assurance,
                            date_debut_adherence : date_debut_adherence,
                            date_fin_adherence : date_fin_adherence,
                            affil : affil,
                            validation : validation
                    }),
                    success: function(response) {
                        if (response.success) {
                            console.log('enfant created succefuly');
                        }
                    },
                    error: function(error) {
                            console.error('Error updating folder data:', error);
                    }
                        
                })
                };
            </script>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection