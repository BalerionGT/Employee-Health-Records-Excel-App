@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Nouveau adhérent') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('users.store')}}">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Information de l\'adhérent') }}</h6>
                            
                            <!--potentiel problem-->

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                            <!-- first row --> 
                            <div class="row d-flex justify-content-center align-items-center">

                                <div class="col-4">
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
                                <!--Nom-->
                                <div class="col-4">
                                <div class="form-group{{ $errors->has('nom') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nom">{{ __('Nom') }}</label>
                                    <input type="text" name="nom" id="input-nom" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}" required autofocus>

                                    @if ($errors->has('nom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nom') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!--Prenom-->
                                <div class="col-4">
                                    <div class="form-group{{ $errors->has('prenom') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-prenom">{{ __('Prénom') }}</label>
                                        <input type="text" name="prenom" id="input-prenom" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="{{ __('Prénom') }}" required autofocus>
    
                                        @if ($errors->has('prenom'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('prenom') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- second row -->
                            <div class="row d-flex justify-content-center align-items-center" >

                                <!-- Département -->
                                <div class="col-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-departement">{{ __('Département') }}</label>
                                        <select class="form-control form-control-alternative" name="departement" id="input-departement">
                                        <option value="">Choisi le département</option>
                                        <option value="DIRECTION FINANCIERE">DIRECTION FINANCIERE</option>
                                        <option value="DIRECTION RESSOURCES HUMAINES">DIRECTION RESSOURCES HUMAINES</option>
                                        <option value="DIRECTION DE QUALITE">DIRECTION DE QUALITE</option>
                                        <option value="FILATURE">FILATURE</option>
                                        <option value="TISSAGE">TISSAGE</option>
                                        <option value="TEINTURE FLAT">TEINTURE FLAT</option>
                                        <option value="TEINTURE">TEINTURE</option>
                                        <option value="EXPEDITION">EXPEDITION</option>
                                        <option value="COMMERCIAL">COMMERCIAL</option>
                                        <option value="MAINTENANCE">MAINTENANCE</option>
                                        <option value="ACHATS">ACHATS</option>
                                        <option value="I+D">I+D</option>
                                        <option value="REVISION">REVISION</option>
                                        <option value="FINISSAGE">FINISSAGE</option>
                                        <option value="PLANIFICATION">PLANIFICATION</option>
                                        <option value="INFORMATIQUE">INFORMATIQUE</option>
                                        <!-- Add more options as needed -->
                                      </select>
                                    </div> 
                              </div>

                                <!-- Sexe -->
                                <div class="col-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-sexe">{{ __('Sexe') }}</label>
                                        <select class="form-control form-control-alternative" name="sexe" id="input-sexe">
                                          <option value="M">M</option>
                                          <option value="F">F</option>
                                        </select>
                                      </div> 
                                </div>
                                
                            </div>
                            <!--third row-->
                            <div class="row d-flex justify-content-center align-items-center mt-5">

                                <!-- Date de naissance -->
                                <div class="col-4">
                                <div class="form-group{{ $errors->has('date_naissance') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-date_naissance">{{ __('Date de naissance') }}</label>
                                    <input type="date" name="date_naissance" id="input-date_naissance" class="form-control form-control-alternative{{ $errors->has('date_naissance') ? ' is-invalid' : '' }}" placeholder="{{ __('Date de naissance') }}" required autofocus>

                                    @if ($errors->has('date_naissance'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_naissance') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Date de recrutement -->
                                <div class="col-4">
                                <div class="form-group{{ $errors->has('date_recrutement') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-date_recrutement">{{ __('Date de recrutement') }}</label>
                                    <input type="date" name="date_recrutement" id="input-date_recrutement" class="form-control form-control-alternative{{ $errors->has('date_recrutement') ? ' is-invalid' : '' }}" placeholder="{{ __('Date de recrutement') }}" required autofocus>

                                    @if ($errors->has('date_recrutement'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_recrutement') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Situation de famille -->
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-situation_famille">{{ __('Situation de famille') }}</label>
                                          <select class="form-control form-control-alternative" name="situation_famille" id="input-situation_famille">
                                            <option value="">Situation de famille</option>
                                            <option value="Célibataire">Célibataire</option>
                                            <option value="Marié">Marié</option>
                                            <!-- Add more options as needed -->
                                          </select>
                                    </div> 
                                </div>
                            </div>

                            <!--fourth row-->
                            <div class="row d-flex justify-content-center align-items-center mt-5">

                                <!-- Nombre d'enfant -->

                                <div class="col-4">
                                <div class="form-group{{ $errors->has('nbre_enfant') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nbre_enfant">{{ __('Nombre d\'enfant') }}</label>
                                    <input type="text" name="nbre_enfant" id="input-nbre_enfant" class="form-control form-control-alternative{{ $errors->has('nbre_enfant') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre d\'enfant') }}" required autofocus>

                                    @if ($errors->has('nbre_enfant'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nbre_enfant') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Matricule du conjoint et 0 sinon -->

                                <div class="col-4">
                                <div class="form-group{{ $errors->has('matricule_conjoint') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-matricule_conjoint">{{ __('Matricule du conjoint') }}</label>
                                    <input type="text" name="matricule_conjoint" id="input-matricule_conjoint" class="form-control form-control-alternative{{ $errors->has('matricule_conjoint') ? ' is-invalid' : '' }}" placeholder="{{ __('Matricule du conjoint') }}" required autofocus>

                                    @if ($errors->has('matricule_conjoint'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('matricule_conjoint') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $("#input-situation_famille").on("change", function() {
                                            const selectedItem = $(this).val();
                                            if (selectedItem === "Célibataire") {
                                                $("#input-matricule_conjoint").prop("disabled", true);
                                                $("#input-nbre_enfant").prop("disabled", true);
                                            }
                                            else{
                                                $("#input-matricule_conjoint").prop("disabled", false);
                                                $("#input-nbre_enfant").prop("disabled", false);
                                            }
                                        });
                                    });
                                </script>
                                
                                <!-- Validation de l'assurance -->

                                <div class="col-4">
                                <div class="form-group{{ $errors->has('validation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-validation">{{ __('Validé par l\'assurance') }}</label>
                                    <input type="checkbox" name="validation" id="input-validation" class="form-control"checked autofocus> <!-- the checkbox should be naturally checked-->
    
                                    @if ($errors->has('validation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('validation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                            </div>

                                <!-- fifth row ligne des boutons -->
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Enregistrer') }}</button>
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
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
