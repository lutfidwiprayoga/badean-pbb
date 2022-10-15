@extends('layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
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
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <form action="{{ route('riwayatpbb.index') }}" method="GET">
                                <div class="input-group mb-1">
                                    <select name="tahun_awal" class="form-select">
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                    <select name="tahun_akhir" class="form-select">
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                    <button class="btn btn-success btn-sm" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 my-2">
                            @if (Request::input('tahun_awal', 'tahun_akhir'))
                                <form action="{{ route('admin.pdf') }}" method="GET">
                                    <input type="text" name="tahun_awal_id" value="{{ $tahun_awal }}" hidden>
                                    <input type="text" name="tahun_akhir_id" value="{{ $tahun_akhir }}" hidden>
                                    <button type="submit" class="btn btn-success" style="float: right">Cetak
                                        PDF</button>
                                </form>
                            @else
                                <a type="button" href="{{ route('admin.pdf') }}" class="btn btn-success"
                                    style="float: right">
                                    Cetak PDF
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="dt-responsive display nowrap table-striped table-bordered table"
                                    style="width:100%" id="tableRiwayat">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NOP</th>
                                            <th>NAMA WAJIB PAJAK</th>
                                            <th>ALAMAT WAJIB PAJAK</th>
                                            <th>TAHUN PAJAK</th>
                                            <th>PBB</th>
                                            <th>DENDA(*)</th>
                                            <th>KURANG BAYAR</th>
                                            <th>STATUS BAYAR</th>
                                            <th>KODE BAYAR</th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>NOP</th>
                                            <th>NAMA WAJIB PAJAK</th>
                                            <th>ALAMAT WAJIB PAJAK</th>
                                            <th>TAHUN PAJAK</th>
                                            <th>PBB</th>
                                            <th>DENDA(*)</th>
                                            <th>KURANG BAYAR</th>
                                            <th>STATUS BAYAR</th>
                                            <th>KODE BAYAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cetak as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row->nops->nop }}</td>
                                                <td>{{ $row->nops->nama_wp }}</td>
                                                <td>{{ $row->nops->alamat_wp }}</td>
                                                <td>{{ $row->tahun }}</td>
                                                <td>Rp. {{ number_format($row->pbb) }}</td>
                                                <td>Rp. {{ number_format($row->denda) }}</td>
                                                <td>Rp. {{ number_format($row->kekurangan) }}</td>
                                                <td>{{ $row->status_bayar }}</td>
                                                <td>{{ $row->kode_bayar }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        @foreach ($total as $row)
                                            <tr>
                                                <th colspan="7">Total</th>
                                                <th>Rp. {{ number_format($row->kurang_bayar) }}</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        @endforeach
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {});
        $('.form-select').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
    <!--Datatable -->
    <script>
        $(document).ready(function() {
            var table = $('#tableRiwayat').DataTable();
            $("#tableRiwayat thead tr th").each(function(i) {
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
        });
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!--Target OA Win Java-->
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
                categories: {!! json_encode($statusnya) !!},
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
