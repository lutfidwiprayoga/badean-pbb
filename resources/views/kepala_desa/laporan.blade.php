@extends('layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="statusBayar"></div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody>
                            <tr>
                                <td>Minimum date:</td>
                                <td><input type="text" class="form-control" id="minDate" name="min"></td>
                                <td>Maximum date:</td>
                                <td><input type="text" class="form-control" id="maxDate" name="max"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="dt-responsive display nowrap table-striped table-bordered table" style="width:100%"
                            id="tableHistory" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NOP</th>
                                    <th>NAMA WAJIB PAJAK</th>
                                    <th>ALAMAT WAJIB PAJAK</th>
                                    <th>TAHUN PAJAK</th>
                                    <th>PBB</th>
                                    <th>JATUH TEMPO</th>
                                    <th>DENDA(*)</th>
                                    <th>KURANG BAYAR</th>
                                    <th>STATUS BAYAR</th>
                                    <th>KODE BAYAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $i => $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->nops->nop }}</td>
                                        <td>{{ $row->nops->nama_wp }}</td>
                                        <td>{{ $row->nops->alamat_wp }}</td>
                                        <td>{{ $row->tahun }}</td>
                                        <td>Rp. {{ number_format($row->pbb) }}</td>
                                        <td>{{ date('l,d F Y', strtotime($row->jatuh_tempo)) }}</td>
                                        <td>Rp. {{ number_format($row->denda) }}</td>
                                        <td>Rp. {{ number_format($row->kekurangan) }}</td>
                                        <td>{{ $row->status_bayar }}</td>
                                        <td><i>{{ $row->kode_bayar }}</i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>NOP</th>
                                    <th>NAMA WAJIB PAJAK</th>
                                    <th>ALAMAT WAJIB PAJAK</th>
                                    <th>TAHUN PAJAK</th>
                                    <th>PBB</th>
                                    <th>JATUH TEMPO</th>
                                    <th>DENDA(*)</th>
                                    <th>KURANG BAYAR</th>
                                    <th>STATUS BAYAR</th>
                                    <th>KODE BAYAR</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Datatable-->
    <script>
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[4]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );
        $(document).ready(function() {
            minDate = new DateTime($('#minDate'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#maxDate'), {
                format: 'MMMM Do YYYY'
            });
            var table = $('#tableHistory').DataTable({
                dom: 'Bfrtip',
                buttons: ['pdf', 'print', ]
            });
            $("#tableHistory tfoot tr th").each(function(i) {
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(this).empty())
                    .on('change', function() {
                        var val = $(this).val();
                        table.column(i)
                            .search(val ? '^' + $(this).val() + '$' :
                                val, true, false)
                            .draw();
                    });
                table.column(i).data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
            $('#minDate, #maxDate').on('change', function() {
                table.draw();
            });
        });
    </script>
    <!--Grafik Chart-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var barColors = (function() {
            var colors = [],
                base = Highcharts.getOptions().colors[0],
                i;
            for (i = 0; i < 10; i += 1) {
                // Start out with a darkened base color (negative brighten), and end
                // up with a much brighter color
                colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
            }
            return colors;
        }());
        Highcharts.setOptions({
            colors: ['#559584']
        });
        Highcharts.chart('statusBayar', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'PBB DESA BADEAN'
            },
            xAxis: {
                categories: {!! json_encode($status) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '#PEMBAYARAN'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">Total : </td>' +
                    '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Jumlah Pembayaran',
                data: {!! json_encode($total_status) !!}
            }]
        });
    </script>
@endsection
