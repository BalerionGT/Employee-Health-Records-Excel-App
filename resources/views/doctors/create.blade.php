@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Nouveau médecin') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{route('doctors.store')}}">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Information du médecin') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">

                                <!--Télephone-->
                                <div class="form-group{{ $errors->has('tel') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tel">{{ __('Télephone') }}</label>
                                    <input type="text" name="tel" id="input-tel" class="form-control form-control-alternative{{ $errors->has('tel') ? ' is-invalid' : '' }}" placeholder="{{ __('Télephone') }}" required autofocus>

                                    @if ($errors->has('tel'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tel') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!--Nom-->
                                <div class="form-group{{ $errors->has('nom') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nom">{{ __('Nom') }}</label>
                                    <input type="text" name="nom" id="input-nom" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}" required>

                                    @if ($errors->has('nom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nom') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!--Prénom-->
                                <div class="form-group{{ $errors->has('prenom') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-prenom">{{ __('Prénom') }}</label>
                                    <input type="text" name="prenom" id="input-prenom" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="{{ __('Prénom') }}" required>

                                    @if ($errors->has('prenom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prenom') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!--Adresse-->
                                <div class="form-group{{ $errors->has('adresse') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-adresse">{{ __('Adresse') }}</label>
                                    <input type="text" name="adresse" id="input-adresse" class="form-control form-control-alternative{{ $errors->has('adresse') ? ' is-invalid' : '' }}" placeholder="{{ __('Adresse') }}" required>

                                    @if ($errors->has('adresse'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('adresse') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!--Ville-->
                                <div class="form-group{{ $errors->has('ville') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-ville">{{ __('Ville') }}</label>
                                    <input type="text" name="ville" id="input-email" class="form-control form-control-alternative{{ $errors->has('ville') ? ' is-invalid' : '' }}" placeholder="{{ __('Ville') }}" required>

                                    @if ($errors->has('ville'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ville') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!--Type et spécialité de médecin-->
                                <h6 class="heading-small text-muted mb-4">{{ __('Type de spécialité du médecin') }}</h6>
                                <div class="container border">
                                    <div class="row">
                                    <div class="form-group{{ $errors->has('géneraliste') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-géneraliste">{{ __('Géneraliste') }}</label>
                                        <input type="checkbox" name="géneraliste" id="input-géneraliste" class="form-control" autofocus style="transform: scale(0.8);"> <!-- Adjust the scale value as needed -->
                                        
                                        @if ($errors->has('géneraliste'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('géneraliste') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-0">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-spécialiste">{{ __('Spécialiste') }}</label>
                                                <input type="checkbox" name="spécialiste" id="input-spécialiste" class="form-control" autofocus style="transform: scale(0.8);"> <!-- Adjust the scale value as needed -->
                                                
                                                @if ($errors->has('spécialiste'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('spécialiste') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-11 mt-4">
                                            <div class="form-group{{ $errors->has('spécialité') ? ' has-danger' : '' }}">
                                                <input type="text" name="spécialité" id="input-spécialité" class="form-control form-control-alternative{{ $errors->has('Nom') ? ' is-invalid' : '' }}" placeholder="{{ __('Spécialité') }}">
            
                                                @if ($errors->has('spécialité'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('spécialité') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(document).ready(function(){
                                            $("#input-géneraliste").on("change", function() {
                                            if ($(this).is(":checked")) {
                                                $("#input-spécialiste").prop("disabled", true);
                                                $("#input-spécialité").prop("disabled", true);
                                            }
                                            else{
                                                $("#input-spécialiste").prop("disabled", false);
                                                $("#input-spécialité").prop("disabled", false);    
                                            }
                                            });

                                            $("#input-spécialiste").on("change", function() {
                                                if ($(this).is(":checked")) {
                                                    $("#input-géneraliste").prop("disabled", true);
                                                }
                                                else{
                                                    $("#input-géneraliste").prop("disabled", false);
                                                }
                                            });
                                            
                                        });
                                    </script>

                                </div>

                                <!--Conventionné-->
                                <h6 class="heading-small text-muted mb-4">{{ __('Convensionné') }}</h6>
                                <div class="container border mt-4">
                                <div class="row">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="form-group{{ $errors->has('convention-oui') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Oui') }}</label>
                                            <input type="checkbox" name="convention-oui" id="input-convention-oui" class="form-control" autofocus style="transform: scale(1.6);"> <!-- Adjust the scale value as needed -->
                                            
                                            @if ($errors->has('convention-oui'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('convention-oui') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="form-group{{ $errors->has('convention-non') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-convention-non">{{ __('Non') }}</label>
                                            <input type="checkbox" name="convention-non" id="input-convention-non" class="form-control" autofocus style="transform: scale(1.3);"> <!-- Adjust the scale value as needed -->
                                            
                                            @if ($errors->has('convention-non'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('convention-non') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        $("#input-convention-oui").on("change" , function() {
                                            if ($(this).is(":checked")) {
                                                $("#input-convention-non").prop("disabled", true);
                                            }
                                            else{
                                                $("#input-convention-non").prop("disabled", false);
                                            }
                                        })

                                        $("#input-convention-non").on("change" , function() {
                                            if ($(this).is(":checked")) {
                                                $("#input-convention-oui").prop("disabled", true);
                                            }
                                            else{
                                                $("#input-convention-oui").prop("disabled", false);
                                            }
                                        })
                                    });
                                </script>
                                <!-- row ligne des boutons -->
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