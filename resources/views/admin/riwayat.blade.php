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
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-10">
                                <select name="dari" class="form-select">
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                                <p>S/D</p>
                                <select name="dari" class="form-select">
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                            <div class="col-md-2 pull-right">
                                <a type="button" href="" class="btn btn-primary btn-sm">
                                    Cetak PDF
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-bordered">
                                <table class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NAMA WAJIB PAJAK</th>
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
                                                <td>{{ $row->nama_wp }}</td>
                                                <td>{{ $row->pbb->tahun }}</td>
                                                <td>Rp. {{ number_format($row->pbb->pbb) }}</td>
                                                <td>{{ $row->pbb->denda }}</td>
                                                <td>{{ $row->pbb->kekurangan }}</td>
                                                <td>{{ $row->pbb->status_bayar }}</td>
                                                <td>{{ $row->pbb->kode_bayar }}</td>
                                            </tr>
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
@endsection
