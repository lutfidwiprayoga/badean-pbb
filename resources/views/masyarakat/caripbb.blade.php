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
                                    <button class="btn btn-primary" type="submit" style="width: 85%">Cari</button>
                                </div>
                            </form>
                        </div>
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
                                        <table class="table-bordered">
                                            <thead>
                                                <tr>
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
                                                    <td>{{ $data->pbb->tahun }}</td>
                                                    <td>Rp. {{ number_format($data->pbb->pbb) }}</td>
                                                    <td>{{ $data->pbb->denda }}</td>
                                                    <td>{{ $data->pbb->kekurangan }}</td>
                                                    <td>{{ $data->pbb->status_bayar }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
