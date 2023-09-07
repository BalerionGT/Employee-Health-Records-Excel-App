@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Liste des conjoints') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container" style="overflow: auto;">
                        <table id="doctors" class="table table-hover">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Sexe</th>
                                    <th scope="col">Date de naissance</th>
                                    <th scope="col">Code d'assurance</th>
                                    <th scope="col">Date de début d'adhérence</th>
                                    <th scope="col">Date de fin d'adhérence</th>
                                    <th scope="col">Validation</th>
                                    <th scope="col">Affil</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($conjoints as $conjoint)
                                <tr>
                                    <td>{{$conjoint->nom}}</td>
                                    <td>{{$conjoint->prenom}}</td>
                                    <td>{{$conjoint->sexe}}</td>
                                    <td>{{$conjoint->date_naissance}}</td>
                                    <td>{{$conjoint->code_assurance}}</td>
                                    <td>{{$conjoint->date_debut_adherence}}</td>
                                    <td>{{$conjoint->date_fin_adherence}}</td>
                                    <td>{{$conjoint->validation}}</td>
                                    <td>{{$conjoint->affil}}</td>
                                    <td><a href="{{ route('conjoints.edit', ['conjoint' => $conjoint->id]) }}" class="btn btn-success">Modifier</a>
                                    <form action="{{ route('conjoints.destroy', ['conjoint' => $conjoint->id]) }}" method="post">
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