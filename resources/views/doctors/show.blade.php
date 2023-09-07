@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Liste des médecins') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container" style="overflow: auto;">
                        <table id="doctors" class="table table-hover">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Tel</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">Spécialité</th>
                                    <th scope="col">convention</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medecins as $medecin)
                                <tr>
                                    <td>{{$medecin->nom}}</td>
                                    <td>{{$medecin->prenom}}</td>
                                    <td>{{$medecin->tel}}</td>
                                    <td>{{$medecin->adresse}}</td>
                                    <td>{{$medecin->ville}}</td>
                                    <td>{{$medecin->specialiste}}</td>
                                    <td>{{$medecin->convention}}</td>
                                    <td><a href="{{ route('doctors.edit', ['doctor' => $medecin->id]) }}" class="btn btn-success">Modifier</a>
                                    <form action="{{ route('doctors.destroy', ['doctor' => $medecin->id]) }}" method="post">
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