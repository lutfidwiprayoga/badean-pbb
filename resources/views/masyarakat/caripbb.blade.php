@extends('layouts.master')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <p class="card-header">Cari Data Pajak Dan Bangunan</p>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('cari.pbb') }}" method="GET">
                                <div class="m-2 row">
                                    <label for="nop" class="col-md-2 form-label">Kode Objek Pajak (NOP)</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="nop" name="cari"
                                            placeholder="Masukkan Nomor Objek Pajak" required>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <button class="btn btn-success mt-1" type="submit"
                                            style="width: 20%; justify-content: center;">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><br>
            @if (Request::input('cari'))
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($hasil as $i => $data)
                                    <table class="table-condensed">
                                        <tr>
                                            <th width="50%">NOP</th>
                                            <th width="30px">:</th>
                                            <td>{{ $data->nop }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Alamat Objek Pajak</th>
                                            <th width="30px">:</th>
                                            <td>{{ $data->user->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Nama Wajib Pajak</th>
                                            <th width="30px">:</th>
                                            <td>{{ $data->nama_wp }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Alamat Wajib Pajak</th>
                                            <th width="30px">:</th>
                                            <td>{{ $data->alamat_wp }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Tanggal Print Out</th>
                                            <th width="30px">:</th>
                                            <td>{{ date('d/m/Y', strtotime(today())) }}</td>
                                        </tr>
                                    </table><br>
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
