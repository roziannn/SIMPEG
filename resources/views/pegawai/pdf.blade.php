<html>

<head>
    <title>Data Pegawai</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 8pt;
            text-align: center;
        }

        table {
            border-left: 0.01em solid #ccc;
            border-right: 0;
            border-top: 0.01em solid #ccc;
            border-bottom: 0;
            border-collapse: collapse;
        }

        table td,
        table th {
            border-left: 0;
            border-right: 0.01em solid #ccc;
            border-top: 0;
            border-bottom: 0.01em solid #ccc;
        }
    </style>
    <center>
        <h3>DATA PEGAWAI</h3>
    </center>

    <h6>Tanggal Cetak : {{ \Carbon\Carbon::now()}}</h6>

    <table class='table table-bordered' cellpadding="2" border="0" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="10%">NIP</th>
                <th>Nama</th>
                <th>Unit Kerja</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Nomor Hp</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pegawai as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item['nip'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['unitkerja_nama'] }}</td>
                    <td>{{ $item['jabatan'] }}</td>
                    <td>{{ $item['status_pegawai'] }}</td>
                    <td>{{ $item['no_telp'] }}</td>
                    <td>{{ $item['alamat'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
