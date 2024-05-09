@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Nouveau dossier d\'envoi') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="dataForm">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Information du dossier d\'envoi') }}</h6>
                            
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
                                <!-- Numéro d'envoie -->
                                <div class="col-3">
                                <div class="form-group{{ $errors->has('num_envoie') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-num_envoie">{{ __('Numéro d\'envoie') }}</label>
                                    <input type="text" name="num_envoie" id="input-num_envoie" class="form-control form-control-alternative{{ $errors->has('num_envoie') ? ' is-invalid' : '' }}" placeholder="{{ __('Numéro d\'envoie') }}" required autofocus>

                                    @if ($errors->has('num_envoie'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('num_envoie') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                                <div class="col-1">
                                    <h6>1-Maladie<br>
                                    2-Dentiste<br>
                                    3-Optique<br>
                                    4-Naissance</h6>
                                </div>
                                <!-- Date d'envoi -->
                                <div class="col-2">
                                <div class="form-group{{ $errors->has('date_envoie') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-date_envoie">{{ __('Date d\'envoi') }}</label>
                                    <input type="date" name="date_envoie" id="input-date_envoie" class="form-control form-control-alternative{{ $errors->has('date_envoie') ? ' is-invalid' : '' }}" value="<?php echo date('Y-m-d'); ?>" placeholder="{{ __('Date d\'envoi') }}"  required autofocus>

                                    @if ($errors->has('date_envoie'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_envoie') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Nombre de dossier -->
                                <div class="col-3">
                                <div class="form-group{{ $errors->has('nbre_dossier') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nbre_dossier">{{ __('Nombre de dossier') }}</label>
                                    <input type="text" name="nbre_dossier" id="input-nbre_dossier" class="form-control form-control-alternative{{ $errors->has('nbre_dossier') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de dossier') }}" required autofocus>
    
                                     @if ($errors->has('nbre_dossier'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nbre_dossier') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>

                                <!-- Montant engagés -->
                                <div class="col-3">
                                    <div class="form-group{{ $errors->has('montant_engage') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-montant_engage">{{ __('Montant engagés') }}</label>
                                        <input type="text" name="montant_engage" id="input-montant_engage" class="form-control form-control-alternative{{ $errors->has('montant_engage') ? ' is-invalid' : '' }}" placeholder="{{ __('Montant engagés') }}" required autofocus>
        
                                         @if ($errors->has('montant_engage'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('montant_engage') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Information des dossiers') }}</h6>

                            <!-- Les dossiers du dossier d'envoie -->
                            <div class="container border">
                                <!-- first row -->
                                <div class="row d-flex justify-content-center align-items-center">

                                    <!-- Matricule -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('matricule') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-matricule">{{ __('Matricule') }}</label>
                                            <input type="matricule" name="matricule" id="input-matricule" class="form-control form-control-alternative{{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('Matricule') }}" required autofocus>
            
                                             @if ($errors->has('matricule'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('matricule') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Date visite -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('date_visite') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-date_visite">{{ __('Date visite') }}</label>
                                            <input type="date" name="date_visite" id="input-date_visite" class="form-control form-control-alternative{{ $errors->has('date_visite') ? ' is-invalid' : '' }}" placeholder="{{ __('Date visite') }}" required autofocus>
            
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
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-lien">{{ __('Lien de parenté') }}</label>
                                              <select class="form-control form-control-alternative" name="lien" id="input-lien">
                                                <option value="">choisir un lien</option>
                                                <option value="Lui-Même">Lui-Même</option>
                                                <option value="Enfant">Enfant</option>
                                                <option value="Parent">Parent</option>
                                              </select>
                                        </div> 
                                    </div>

                                    <!-- Conjoint et enfants -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-malade">{{ __('Conjoint et enfants') }}</label>
                                              <select class="form-control form-control-alternative" name="malade" id="input-malade">
                                              </select>
                                        </div> 
                                    </div>

                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Les frais engagées') }}</h6>

                            <!-- les frais engages -->
                            <div class="container border">
                                <!-- first row -->
                                <div class="row d-flex justify-content-center align-items-center">

                                    <!-- Visite -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('visite') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-visite">{{ __('Visite') }}</label>
                                            <input type="text" name="visite" id="input-visite" class="form-control form-control-alternative{{ $errors->has('visite') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('visite'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('visite') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Pharmacie -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('pharmacie') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-pharmacie">{{ __('Pharmacie') }}</label>
                                            <input  type="text" name="pharmacie" id="input-pharmacie" class="form-control form-control-alternative{{ $errors->has('pharmacie') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('pharmacie'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('pharmacie') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Radio -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('radio') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-radio">{{ __('Radio') }}</label>
                                            <input  type="text" name="radio" id="input-radio" class="form-control form-control-alternative{{ $errors->has('radio') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('radio'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('radio') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Analyse -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('analyse') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-analyse">{{ __('Analyse') }}</label>
                                            <input  type="text" name="analyse" id="input-analyse" class="form-control form-control-alternative{{ $errors->has('analyse') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('analyse'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('analyse') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Auxiliaires -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('auxiliaires') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-auxiliaires">{{ __('Auxiliaires') }}</label>
                                            <input  type="text" name="auxiliaires" id="input-auxiliaires" class="form-control form-control-alternative{{ $errors->has('auxiliaires') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('auxiliaires'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('auxiliaires') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Optique -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('optique') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-optique">{{ __('Optique') }}</label>
                                            <input  type="text" name="optique" id="input-optique" class="form-control form-control-alternative{{ $errors->has('optique') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('optique'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('optique') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- S.Dentaires -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('soin_dentaires') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-soin_dentaires">{{ __('S.Dentaires') }}</label>
                                            <input  type="text" name="soin_dentaires" id="input-soin_dentaires" class="form-control form-control-alternative{{ $errors->has('soin_dentaires') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('soin_dentaires'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('soin_dentaires') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Prothèse -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('prothèse') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-prothèse">{{ __('Prothèse') }}</label>
                                            <input  type="text" name="prothèse" id="input-prothèse" class="form-control form-control-alternative{{ $errors->has('prothèse') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('prothèse'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('prothèse') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Autres -->
                                    <div class="col-1">
                                        <div class="form-group{{ $errors->has('autres') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-autres">{{ __('Autres') }}</label>
                                            <input  type="text" name="autres" id="input-autres" class="form-control form-control-alternative{{ $errors->has('autres') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('autres'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('autres') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Prise en charge -->
                                    <div class="col-2">
                                        <div class="form-group{{ $errors->has('prise_en_charge') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-prise_en_charge">{{ __('Prise en charge') }}</label>
                                            <input  type="text" name="prise_en_charge" id="input-prise_en_charge" class="form-control form-control-alternative{{ $errors->has('prise_en_charge') ? ' is-invalid' : '' }}" autofocus>
            
                                             @if ($errors->has('prise_en_charge'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('prise_en_charge') }}</strong>
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
                                            <input type="text" name="observations" id="input-observations" class="form-control form-control-alternative{{ $errors->has('observations') ? ' is-invalid' : '' }}" placeholder="{{ __('Observation') }}" autofocus>
            
                                             @if ($errors->has('observations'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('observations') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Montant total -->
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('montant_totale') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-montant_totale">{{ __('Montant total') }}</label>
                                            <input type="text" name="montant_totale" id="input-montant_totale" class="form-control form-control-alternative{{ $errors->has('montant_totale') ? ' is-invalid' : '' }}" placeholder="{{ __('Montant total') }}" autofocus>
            
                                             @if ($errors->has('montant_totale'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('montant_totale') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>  
                            <!-- div du container -->

                            <!-- third row ligne des boutons -->
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" id="btnSubmit" class="btn btn-success mt-4">{{ __('Enregistrer') }}</button>
                                </div>

                                <div class="col text-center">
                                    <button type="reset" id="btnReset" class="btn btn-danger mt-4">{{ __('Annuler') }}</button>
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