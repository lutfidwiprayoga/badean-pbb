<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Laporan PBB</title>
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
            <center>History Pembayaran Pajak Bumi & Bangunan Desa Badean</center>
        </h3>
        <div class="col-md-12">
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
                    @foreach ($history as $i => $data)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $data->nops->nama_wp }}</td>
                            <td>{{ $data->tahun }}</td>
                            <td>Rp. {{ number_format($data->pbb) }}</td>
                            <td>Rp. {{ number_format($data->denda) }}</td>
                            <td>{{ date('d/m/Y', strtotime($data->jatuh_tempo)) }}</td>
                            <td>Rp. {{ number_format($data->kekurangan) }}</td>
                            <td>{{ $data->status_bayar }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
