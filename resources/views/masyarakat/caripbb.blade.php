@extends('layouts.master')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <p class="card-title">Cari Data Pajak Dan Bangunan</p>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('cari.pbb') }}" method="GET">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 form-check-label">NOP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="cari">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit" style="width: 85%">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @if (Request::input('cari'))
                        <div class="row">
                            @foreach ($hasil as $i => $data)
                                <div class="col-md-12">
                                    <table class="table-condensed">
                                        <tr>
                                            <th width="50%">NOP</th>
                                            <th width="30px">:</th>
                                            <th>{{ $data->nop }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Alamat Objek Pajak</th>
                                            <th width="30px">:</th>
                                            <th>{{ $data->user->alamat }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Nama Wajib Pajak</th>
                                            <th width="30px">:</th>
                                            <th>{{ $data->nama_wp }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Alamat Wajib Pajak</th>
                                            <th width="30px">:</th>
                                            <th>{{ $data->alamat_wp }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Tanggal Print Out</th>
                                            <th width="30px">:</th>
                                            <th>{{ date('d/m/Y', strtotime(today())) }}</th>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA WAJIB PAJAK</th>
                                                <th>TAHUN WAJIB PAJAK</th>
                                                <th>PBB</th>
                                                <th>DENDA(*)</th>
                                                <th>JATUH TEMPO</th>
                                                <th>KURANG BAYAR</th>
                                                <th>STATUS BAYAR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $data->nama_wp }}</td>
                                                <td>{{ $data->tahun }}</td>
                                                <td>Rp. {{ number_format($data->pbb) }}</td>
                                                <td>Rp. {{ number_format($data->denda) }}</td>
                                                <td>{{ date('d/m/Y', strtotime($data->jatuh_tempo)) }}</td>
                                                <td>Rp. {{ number_format($data->kekurangan) }}</td>
                                                <td>{{ $data->status_bayar }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <thead>
                                                @foreach ($total as $data)
                                                    <tr>
                                                        <th colspan="7">TOTAL PBB YANG BELUM
                                                            DIBAYAR</th>
                                                        <th>Rp. {{ number_format($data->total_pbb) }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="7">TOTAL DENDA (SESUAI TANGGAL <i>PRINTOUT</i>)</th>
                                                        <th>Rp. {{ number_format($data->total_denda) }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="7">JUMLAH YANG HARUS DIBAYAR</th>
                                                        <th>Rp. {{ number_format($data->total_dibayar) }}</th>
                                                    </tr>
                                                @endforeach
                                            </thead>
                                        </tfoot>
                                    </table>
                                    <form action="{{ route('masyarakat.pdf') }}" method="GET">
                                        <input type="text" name="cari_id" value="{{ $cari }}" hidden>
                                        <div class="col-md-2 pull-right">
                                            <button type="submit" class="btn btn-success btn-sm">Cetak PDF</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
