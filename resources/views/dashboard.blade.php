@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0 center">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Dépenses</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":@json($CollectionData1->pluck("total_montant_engage")->toArray())}]}}' data-prefix="$" data-suffix="DH">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Envoie</span>
                                            <span class="d-md-none">E</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":@json($CollectionData2->pluck("total_montant_engage")->toArray())}]}}' data-prefix="$" data-suffix="DH">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Reception</span>
                                            <span class="d-md-none">R</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0 center">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Employés/Département</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Départements</th>
                                    <th scope="col">Nombre d'employés</th>
                                    <th scope="col">Pourcentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $colors = ['bg-gradient-danger', 'bg-gradient-warning', 'bg-gradient-success', 'bg-gradient-info'];
                                $colorIndex = 0;
                            @endphp
                            
                            @foreach($departements as $departement)
                                <tr>
                                    <th scope="row">
                                        {{$departement->departement}}
                                    </th>
                                    <td>
                                        {{$departement->count}}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">{{ floor(($departement->count / $nbre_adherent) * 100) }}%
                                            </span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar {{$colors[$colorIndex]}}" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{($departement->count/$nbre_adherent)*100}}%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $colorIndex = ($colorIndex + 1) % count($colors); // Cycle through colors
                                @endphp
                            @endforeach                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush