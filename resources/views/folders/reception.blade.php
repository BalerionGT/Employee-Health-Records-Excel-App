@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Bordereau de reception') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                        <select class="form-control form-control-alternative" name="folders" id="selected_folder">
                            <option value="">Choisie un dossier de reception</option>
                            @foreach($folders as $folder)
                            <option value="{{$folder->num_recu}}">{{$folder->num_recu}}</option>
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

            // Format the part_medecin1, part_adherent, and part_medecin2 columns as currency
            var range = XLSX.utils.decode_range(ws['!ref']);
            for (var rowNum = range.s.r + 7; rowNum <= range.e.r; rowNum++) {
                var montantTotaleCell = ws[XLSX.utils.encode_cell({ r: rowNum, c: 3 })];
                var montantRembourseCell = ws[XLSX.utils.encode_cell({ r: rowNum, c: 6 })];
                var partMedecin1Cell = ws[XLSX.utils.encode_cell({ r: rowNum, c: 4 })];
                var partAdherentCell = ws[XLSX.utils.encode_cell({ r: rowNum, c: 7 })];
                var partMedecin2Cell = ws[XLSX.utils.encode_cell({ r: rowNum, c: 5 })];
                if (partMedecin1Cell && partMedecin1Cell.t == 'n') {
                    partMedecin1Cell.z = '$0.00';
                }
                if (partAdherentCell && partAdherentCell.t == 'n') {
                    partAdherentCell.z = '$0.00';
                }
                if (partMedecin2Cell && partMedecin2Cell.t == 'n') {
                    partMedecin2Cell.z = '$0.00';
                }
                if (montantTotaleCell && montantTotaleCell.t == 'n') {
                montantTotaleCell.z = '$0.00';
                }
                if (montantRembourseCell && montantRembourseCell.t == 'n') {
                    montantRembourseCell.z = '$0.00';
                }
            }

            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
                XLSX.writeFile(wb, fn || ($('#selected_folder').val() + '.' + (type || 'xlsx')));
        }

        function findsubfolders(numReception){
            $.ajax({
                type: 'GET',
                url: '/subreception/'+numReception,
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
                                '<td colspan="2">RMA-Police N° 97200005</td>' +
                                '<td></td>' +
                                '<td colspan="4">REGLEMENT DES DOSSIERS MEDICAUX</td>' +
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
                                '<td colspan="2" id="ref">REF : DRH/ </td>' +
                                '<td>DE</td>' +
                                '<td>'+$('#selected_folder').val()+'</td>' +
                                '<td>A</td>' +
                                '<td>'+$('#selected_folder').val()+'</td>' +
                                '<td>Réglé sur paie Mois de:</td>' +
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
                                '<th>Tot.Remb</th>'+
                                '<th>Part Med.1</th>'+
                                '<th>Part Med.2</th>'+
                                '<th>Part Med.3</th>'+
                                '<th>Part Adherent</th>'+
                                '</tr>');
                    $('#ref').append(response.num_envoie);
                    let index = []; // This creates an empty array
                    for (var i = 0; i < data.length; i++) {
                        if(!index.includes(i)){
                        html += '<tr>' +
                                '<td>' + data[i].matricule + '</td>' +
                                '<td>' + data[i].adherent_nom + '</td>' +
                                '<td>' + data[i].adherent_prenom + '</td>' +
                                '<td>'+ data[i].montant_rembourse + '</td>' +
                                '<td>' + data[i].montant_totale + '</td>' +
                                '<td>' + data[i].part_medecin1 + '</td>' +
                                '<td>' + data[i].part_medecin2 + '</td>' +
                                '<td>' + data[i].part_adherent + '</td>' +
                               '</tr>';
                               for(var j = i+1; j < data.length; j++) {

                                    if(data[j].matricule === data[i].matricule){
                                        html += '<tr>' +
                                                '<td></td>' +
                                                '<td></td>' +
                                                '<td></td>' +
                                                '<td>' + data[j].montant_rembourse + '</td>' +
                                                '<td>' + data[j].montant_totale + '</td>' +
                                                '<td>' + data[j].part_medecin1 + '</td>' +
                                                '<td>' + data[j].part_medecin2 + '</td>' +
                                                '<td>' + data[j].part_adherent + '</td>' +
                                                '</tr>';
                                                index.push(j);
                                    }
                               }
                        }
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