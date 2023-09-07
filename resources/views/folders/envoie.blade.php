@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Bordereau d\'envoie') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                        <select class="form-control form-control-alternative" name="folders" id="selected_folder">
                            <option value="">Choisie un dossier d'envoie</option>
                            @foreach($folders as $folder)
                            <option value="{{$folder->num_envoie}}">{{$folder->num_envoie}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <dialog class="table" id="tbl_exporttable_to_xls" border="1">
                    </dialog>

                    <div class="container" style="display: flex; justify-content: center; align-items: center;">
                    <button id="impression" onclick="ExportToExcel('xlsx')" class="btn btn-danger">Imprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       var ws = wb.Sheets["sheet1"];

       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ($('#selected_folder').val()+'.' + (type || 'xlsx')));
    }
        function findsubfolders(numEnvoie){
            $.ajax({
                type: 'GET',
                url: '/subfolders/'+numEnvoie,
                success: function(response) {
                    var data = response.data;
                    var html = ''; // Initialize an empty string to hold the HTML content
                    $('#tbl_exporttable_to_xls').empty();
                    $('#tbl_exporttable_to_xls').append('<thead>' +
                                '<th colspan="2" style="font-weight: bold;">SETTAVEX SA</th>' +
                                '<th></th>' +
                                '<th></th>' +
                                '<th></th>' +
                                '<th></th>' +
                                '<th>SETTAT LE:</th>' +
                                '<th>' + new Date().toISOString().slice(0, 10) + '</th>' +
                                '</thead>' +
                                '<tbody>' +
                                '<tr>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td colspan="2">RMA-Police N° 204079</td>' +
                                '<td colspan="4">BORDEREAU RECAPITULATIF DES DECLARATIONS DE MALADIE</td>' +
                                '<td></td>' +
                                '<td>Page:</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td colspan="3">(DOSSIERS DE MALADIE)</td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td colspan="2" id="ref">REF : DRH/ </td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>' +
                                '<tr>'+
                                '<th>N° Mut</th>'+
                                '<th>NOM</th>'+
                                '<th>PRENOM</th>'+
                                '<th>Prénom Malade</th>'+
                                '<th>Lien Parenté</th>'+
                                '<th>Date Visiste</th>'+
                                '<th>Mt Total</th>'+
                                '<th>Observation</th>'+
                                '</tr>');
                    $('#ref').append(response.num_envoie);

                    for (var i = 0; i < data.length; i++) {
                        html += '<tr>' +
                                '<td>' + data[i].matricule + '</td>' +
                                '<td>' + data[i].adherent_nom + '</td>' +
                                '<td>' + data[i].adherent_prenom + '</td>' +
                                '<td>' + data[i].malade + '</td>' +
                                '<td>' + data[i].lien + '</td>' +
                                '<td>' + data[i].date_visite + '</td>' +
                                '<td>' + data[i].montant_totale + '</td>' +
                                '<td>' + data[i].observations + '</td>' +
                               '</tr>';
                        }
                        html += '</tbody>';
                        $('#tbl_exporttable_to_xls').append(html);
                },
                error: function(error) {
                    console.error('Error fetching subfolders:', error);
                }
            });

        }
        $(document).ready(function() {
                $('#selected_folder').on("change", function(){
                    findsubfolders($('#selected_folder').val());
                })
        });

    </script>
    @include('layouts.footers.auth')
</div>
@endsection