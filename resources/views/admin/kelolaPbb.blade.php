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
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-success btn-sm" data-bs-target="#tambahData"
                                data-bs-toggle="modal">Tambah
                                PBB</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <form action="{{ route('kelolapbb.index') }}" method="GET">
                                <input type="search" class="form-control" id="nop" name="cari"
                                    placeholder="Cari NOP/Nama WP/Tahun Pajak" required>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelola as $i => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->nops->nop }}</td>
                                    <td>{{ $row->nops->nama_wp }}</td>
                                    <td>{{ $row->nops->alamat_wp }}</td>
                                    <td>{{ $row->tahun }}</td>
                                    <td>Rp. {{ number_format($row->pbb) }}</td>
                                    <td>Rp. {{ number_format($row->denda) }}</td>
                                    <td>Rp. {{ number_format($row->kekurangan) }}</td>
                                    <td><b>{{ $row->status_bayar }}</b></td>
                                    <td><i>{{ $row->kode_bayar }}</i></td>
                                    <td><button class="btn btn-warning btn-sm"
                                            data-bs-target="#updateData{{ $row->id }}" data-bs-toggle="modal"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"
                                            data-bs-target="#deleteData{{ $row->id }}" data-bs-toggle="modal"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahData" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="modal-title">Input Data Pajak Bumi Dan Bangunan</h6>
                </div>
                <form action="{{ route('kelolapbb.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="m-2 row">
                            <div class="col-md-9">
                                <label for="nop" class="form-label">Kode Objek Pajak (NOP)*</label>
                                <select name="nop_id" class="form-select" id="nop-Select" required>
                                    @foreach ($nop as $row)
                                        <option value="{{ $row->id }}">{{ $row->nop }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                        </div>
                        <div class="m-2 row">
                            <div class="col-md-4">
                                <label for="nop" class="form-label">PBB*</label>
                                <input type="number" class="form-control" name="pbb" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nop" class="form-label">Denda*</label>
                                <input type="number" class="form-control" name="denda" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nop" class="form-label">Kurang Bayar*</label>
                                <input type="number" class="form-control" name="kekurangan" required>
                            </div>
                        </div>
                        <div class="m-2 row">
                            <div class="col-md-6">
                                <label for="nop" class="form-label">Jatuh Tempo*</label>
                                <input type="date" class="form-control" name="jatuh_tempo" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nop" class="form-label">Status Bayar*</label>
                                <select name="status_bayar" class="form-select">
                                    <option value=""></option>
                                    <option value="LUNAS">LUNAS</option>
                                </select>
                            </div>
                            {{-- <input type="hidden" name=kode_bayar"" value="{{ $tanggal . $nomor_urut }}"> --}}
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
    <!-- Modal Update Data -->
    @foreach ($kelola as $row)
        <div class="modal fade" id="updateData{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h6 class="modal-title">Update Data Pajak Bumi Dan Bangunan</h6>
                    </div>
                    <form action="{{ route('kelolapbb.update', $row->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="m-2 row">
                                <div class="col-md-9">
                                    <label for="nop" class="form-label">Kode Objek Pajak (NOP)*</label>
                                    <input type="text" class="form-control" value="{{ $row->nops->nop }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="nop" class="form-label">Tahun*</label>
                                    <select name="tahun" class="form-select " id="updateDataSelect" required>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                            </div>
                            <div class="m-2 row">
                                <div class="col-md-4">
                                    <label for="nop" class="form-label">PBB*</label>
                                    <input type="number" class="form-control" name="pbb"
                                        value="{{ $row->pbb }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="nop" class="form-label">Denda*</label>
                                    <input type="number" class="form-control" name="denda"
                                        value="{{ $row->denda }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="nop" class="form-label">Kurang Bayar*</label>
                                    <input type="number" class="form-control" name="kekurangan"
                                        value="{{ $row->kekurangan }}" required>
                                </div>
                            </div>
                            <div class="m-2 row">
                                <div class="col-md-6">
                                    <label for="nop" class="form-label">Jatuh Tempo*</label>
                                    <input type="date" class="form-control" name="jatuh_tempo"
                                        value="{{ $row->jatuh_tempo }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nop" class="form-label">Status Bayar*</label>
                                    <select name="status_bayar" class="form-select" id="updateDataSelect">
                                        <option value=""></option>
                                        <option value="LUNAS">LUNAS</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name=kode_bayar"" value="{{ $tanggal . $nomor_urut }}">
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
    @endforeach
    <!-- Modal Delete Data -->
    @foreach ($nop as $row)
        <div class="modal fade" id="deleteData{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h6 class="modal-title">Delete Data Pajak Bumi Dan Bangunan</h6>
                    </div>
                    <form action="{{ route('kelolapbb.destroy', $row->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            Apakah Anda Yakin Menghapus Data Ini?
                        </div>
                        <div class="modal-footer">
                            <div class="input-group mb-1" style="justify-content: center">
                                <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal"
                                    style="width: 25%;">Batal</button>
                                <button type="submit" class="btn btn-danger btn-sm" style="width: 25%;">Ya,
                                    Hapus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        // $(document).ready(function() {});
        $('.form-select').select2({
            dropdownParent: $("#tambahData"),
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
        $('#updateDataSelect').select2({
            dropdownParent: $("#updateData", '.+id+.'),
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
@endsection
