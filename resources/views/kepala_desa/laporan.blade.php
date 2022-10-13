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
                <div class="card-header">
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
        $(document).ready(function() {
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
        });
    </script>
@endsection
