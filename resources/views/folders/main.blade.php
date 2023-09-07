@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Consultation des dossiers') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{route('envoies.index')}}">
                        <div class="card-folder" id="card1">
                            <div class="container">
                                <h4><b>Dossiers d'envoie</b></h4>
                            </div>
                        </div>
                        </a>
                        <a href="{{route('receptions.index')}}">
                        <div class="card-folder mt-4" id="card2">
                            <div class="container">
                                <h4><b>Dossier reçu</b></h4>
                            </div>
                        </div>
                        </a>
                        <a href="{{route('subreceptions.index')}}">
                            <div class="card-folder mt-4" id="card2">
                                <div class="container">
                                    <h4><b>Dossier de maladie</b></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection