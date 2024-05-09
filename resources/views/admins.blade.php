@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Listes des adhérents') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container" style="overflow: auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Departement</th>
                                    <th scope="col">Sexe</th>
                                    <th scope="col">Date de naissance</th>
                                    <th scope="col">Date de recrutement</th>
                                    <th scope="col">Situation de famille</th>
                                    <th scope="col">Nombre d'enfants</th>
                                    <th scope="col">Matricule du conjoint</th>
                                    <th scope="col">validation</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->nom}}</td>
                                    <td>{{$user->prenom}}</td>
                                    <td>{{$user->matricule}}</td>
                                    <td>{{$user->departement}}</td>
                                    <td>{{$user->sexe}}</td>
                                    <td>{{$user->date_naissance}}</td>
                                    <td>{{$user->date_recrutement}}</td>
                                    <td>{{$user->situation_famille}}</td>
                                    <td>{{$user->nbre_enfant}}</td>
                                    <td>{{$user->matricule_conjoint}}</td>
                                    <td>{{$user->validation}}</td>
                                    <td>{{$user->admin}}</td>
                                    <td><a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-success">Modifier</a>
                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
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
        @include('layouts.footers.auth')
    </div>
@endsection