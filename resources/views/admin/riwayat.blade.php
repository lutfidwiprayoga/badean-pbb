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
                            <a type="button" href="{{ route('admin.pdf') }}" class="btn btn-success" style="float: right">
                                Cetak PDF
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" style="width:100%">
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
                                </thead>
                                <tbody>
                                    @foreach ($cetak as $i => $row)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row->nop->nop }}</td>
                                            <td>{{ $row->nop->nama_wp }}</td>
                                            <td>{{ $row->nop->alamat_wp }}</td>
                                            <td>{{ $row->tahun }}</td>
                                            <td>Rp. {{ number_format($row->pbb) }}</td>
                                            <td>Rp. {{ number_format($row->denda) }}</td>
                                            <td>Rp. {{ number_format($row->kekurangan) }}</td>
                                            <td><b>{{ $row->status_bayar }}</b></td>
                                            <td><i>{{ $row->kode_bayar }}</i></td>
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
    <script>
        // $(document).ready(function() {});
        $('.form-select').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
@endsection
