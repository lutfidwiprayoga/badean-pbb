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
                    <button class="btn btn-success btn-sm" data-bs-target="#tambahData" data-bs-toggle="modal">Tambah
                        DATA NOP</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NOP</th>
                                <th>NAMA WAJIB PAJAK</th>
                                <th>ALAMAT WAJIB PAJAK</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nop as $i => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->nop }}</td>
                                    <td>{{ $row->nama_wp }}</td>
                                    <td>{{ $row->alamat_wp }}</td>
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
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h6 class="modal-title">Input Data NOP</h6>
                </div>
                <form action="{{ route('kelolanop.store') }}" method="POST">
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
    @foreach ($nop as $row)
        <div class="modal fade" id="updateData{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h6 class="modal-title">Update Data NOP</h6>
                    </div>
                    <form action="{{ route('kelolanop.update', $row->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="m-2 row">
                                <div class="col-md-6">
                                    <label for="nop" class="form-label">Kode Objek Pajak (NOP)*</label>
                                    <input type="text" class="form-control" id="nop" name="nop"
                                        placeholder="Masukkan Nomor Objek Pajak" value="{{ $row->nop }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nop" class="form-label">Nama Objek Pajak*</label>
                                    <select name="user_id" class="form-select" id="user_id" required>
                                        @foreach ($user as $us)
                                            <option value="{{ $us->id }}">{{ $us->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="m-2 row">
                                <div class="col-md-6">
                                    <label for="nop" class="form-label">Nama Wajib Pajak*</label>
                                    <input type="text" class="form-control" name="nama_wp"
                                        value="{{ $row->nama_wp }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="nop" class="form-label">Alamat Wajib Pajak*</label>
                                    <input type="text" class="form-control" name="alamat_wp"
                                        value="{{ $row->alamat_wp }}">
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
    @endforeach
    <!-- Modal Delete Data -->
    @foreach ($nop as $row)
        <div class="modal fade" id="deleteData{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h6 class="modal-title">Delete Data NOP</h6>
                    </div>
                    <form action="{{ route('kelolanop.destroy', $row->id) }}" method="POST">
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
        $('#user_id').select2({
            dropdownParent: $("#updateData", '.+id+.'),
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
@endsection
