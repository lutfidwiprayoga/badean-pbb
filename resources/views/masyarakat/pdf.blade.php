<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Laporan Donasi Buku</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <div class="row">
        <h3>
            <center>Rekapitulasi Pajak Bumi & Bangunan Desa Badean</center>
        </h3>
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
            </div>
        @endforeach
    </div>
</body>

</html>
