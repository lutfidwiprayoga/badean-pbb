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
                <div class="card-header">
                    <button class="btn btn-success btn-sm" data-bs-target="#tambahData" data-bs-toggle="modal">Tambah
                        PBB</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="width:100%">
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
                            @foreach ($kelola as $i => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->nama_wp }}</td>
                                    <td>{{ $row->tahun }}</td>
                                    <td>Rp. {{ number_format($row->pbb) }}</td>
                                    <td>Rp. {{ number_format($row->denda) }}</td>
                                    <td>Rp. {{ number_format($row->kekurangan) }}</td>
                                    <td><b>{{ $row->status_bayar }}</b></td>
                                    <td><i>{{ $row->kode_bayar }}</i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="modal-title">Input Data Pajak Bumi Dan Bangunan</h6>
                </div>
                <form action="{{ route('kelolapbb.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="m-2 row">
                            <div class="col-md-6">
                                <label for="nop" class="form-label">Kode Objek Pajak (NOP)*</label>
                                <input type="text" class="form-control" id="nop" name="nop"
                                    placeholder="Masukkan Nomor Objek Pajak" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nop" class="form-label">Nama Objek Pajak*</label>
                                <select name="user_id" class="form-select" required>
                                    @foreach ($user as $us)
                                        <option value="{{ $us->id }}">{{ $us->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="m-2 row">
                            <div class="col-md-6">
                                <label for="nop" class="form-label">Nama Wajib Pajak*</label>
                                <input type="text" class="form-control" name="nama_wp">
                            </div>
                            <div class="col-md-6">
                                <label for="nop" class="form-label">Alamat Wajib Pajak*</label>
                                <input type="text" class="form-control" name="alamat_wp" value="DSN JATISARI">
                            </div>
                        </div>
                        <div class="m-2 row">
                            <div class="col-md-3">
                                <label for="nop" class="form-label">Tahun*</label>
                                <select name="tahun" class="form-select" required>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="nop" class="form-label">PBB*</label>
                                <input type="number" class="form-control" name="pbb" required>
                            </div>
                            <div class="col-md-3">
                                <label for="nop" class="form-label">Denda*</label>
                                <input type="number" class="form-control" name="denda" required>
                            </div>
                            <div class="col-md-3">
                                <label for="nop" class="form-label">Kurang Bayar*</label>
                                <input type="number" class="form-control" name="kekurangan" required>
                            </div>
                        </div>
                        <div class="m-2 row">
                            <div class="col-md-4">
                                <label for="nop" class="form-label">Jatuh Tempo*</label>
                                <input type="date" class="form-control" name="jatuh_tempo" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nop" class="form-label">Status Bayar*</label>
                                <select name="status_bayar" class="form-select">
                                    <option value=""></option>
                                    <option value="LUNAS">LUNAS</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="nop" class="form-label">Kode Bayar*</label>
                                <select name="kode_bayar" class="form-select">
                                    <option value=""></option>
                                    <option value="LUNAS">LUNAS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="input-group mb-1">
                            <button type="submit" class="btn btn-primary btn-sm" style="width: 25%">Tambah</button>
                            <button type="submit" class="btn btn-success btn-sm" style="width: 25%">Simpan</button>
                            <button type="reset" class="btn btn-warning btn-sm" style="width: 25%">Hapus</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                                style="width: 25%">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
