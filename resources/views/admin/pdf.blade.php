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
        <table class="table table-bordered">
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
                        <th colspan="5">Total</th>
                        <th>Rp. {{ number_format($row->kurang_bayar) }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                @endforeach
            </tfoot>
        </table>
    </div>
</body>

</html>
