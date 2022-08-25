@extends('layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!--NIK-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nik as $i => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->nik }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Validasi User -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NAMA USER</th>
                                <th>EMAIL</th>
                                <th>USERNAME</th>
                                <th>NIK</th>
                                <th>ALAMAT</th>
                                <th>NO HP</th>
                                <th>VERIFIKASI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($validasi as $i => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->nik }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->no_hp }}</td>
                                    <td>
                                        <form action="{{ route('validuser.verify', $row->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-primary" type="submit">Validasi</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
