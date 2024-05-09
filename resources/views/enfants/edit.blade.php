@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Mise à jour enfant') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('enfants.update',['enfant'=>$enfant->id])}}">
                            @csrf
                            @method('PUT')
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
 
                                <!--Nom-->
                                <div class="col-4">
                                <div class="form-group{{ $errors->has('nom') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nom">{{ __('Nom') }}</label>
                                    <input type="text" name="nom" id="input-nom" class="form-control form-control-alternative{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}" value="{{$enfant->nom}}" required autofocus>

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
                                        <input type="text" name="prenom" id="input-prenom" class="form-control form-control-alternative{{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="{{ __('Prénom') }}" value="{{$enfant->prenom}}" required autofocus>
    
                                        @if ($errors->has('prenom'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('prenom') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <!-- Sexe -->
                                <div class="col-4">
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
                                    <input type="date" name="date_naissance" id="input-date_naissance" class="form-control form-control-alternative{{ $errors->has('date_naissance') ? ' is-invalid' : '' }}" placeholder="{{ __('Date de naissance') }}"  value="{{$enfant->date_naissance}}" required autofocus>

                                    @if ($errors->has('date_naissance'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_naissance') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Date de début d'adhérence -->
                                <div class="col-4">
                                <div class="form-group{{ $errors->has('date_debut_adherence') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-date_debut_adherence">{{ __('Date de début d\'adhérence') }}</label>
                                    <input type="date" name="date_debut_adherence" id="input-debut_adherence" class="form-control form-control-alternative{{ $errors->has('date_debut_adherence') ? ' is-invalid' : '' }}" placeholder="{{ __('Date de début d\'adhérence') }}"  value="{{$enfant->date_debut_adherence}}" required autofocus>

                                    @if ($errors->has('debut_adherence'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('debut_adherence') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Date de fin d'adhérence -->
                                <div class="col-4">
                                    <div class="form-group{{ $errors->has('date_fin_adherence') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-date_fin_adherence">{{ __('Date de fin d\'adhérence') }}</label>
                                        <input type="date" name="date_fin_adherence" id="input-date_fin_adherence" class="form-control form-control-alternative{{ $errors->has('date_fin_adherence') ? ' is-invalid' : '' }}" placeholder="{{ __('Date de fin d\'adhérence') }}" value="{{$enfant->date_fin_adherence}}" required autofocus>
    
                                        @if ($errors->has('date_fin_adherence'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('date_fin_adherence') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--fourth row-->
                            <div class="row d-flex justify-content-center align-items-center mt-5">

                                <!-- Code d'assurance -->

                                <div class="col-4">
                                <div class="form-group{{ $errors->has('code_assurance') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-code_assurance">{{ __('Code d\'assurance') }}</label>
                                    <input type="text" name="code_assurance" id="input-code_assurance" class="form-control form-control-alternative{{ $errors->has('code_assurance') ? ' is-invalid' : '' }}" placeholder="{{ __('Code d\'assurance') }}" value="{{$enfant->code_assurance}}" required autofocus>

                                    @if ($errors->has('code_assurance'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code_assurance') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Validation -->

                                <div class="col-4">
                                <div class="form-group{{ $errors->has('validation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-validation">{{ __('Validé par assurance') }}</label>
                                    <input type="text" name="validation" id="input-validation" class="form-control form-control-alternative{{ $errors->has('validation') ? ' is-invalid' : '' }}" placeholder="{{ __('validé par assurance') }}" value="{{$enfant->validation === 1 ? 'Oui':'Non' }}"  required autofocus>

                                    @if ($errors->has('validation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('validation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Affil -->

                                <div class="col-4">
                                <div class="form-group{{ $errors->has('affil') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-affil">{{ __('Affil') }}</label>
                                    <input type="text" name="affil" id="input-affil" class="form-control form-control-alternative{{ $errors->has('affil') ? ' is-invalid' : '' }}" placeholder="{{ __('Affil') }}" value="{{$enfant->afill === 1 ? 'Oui':'Non' }}" required autofocus>

                                    @if ($errors->has('affil'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('affil') }}</strong>
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
