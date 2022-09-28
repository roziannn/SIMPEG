<html>
<head>
	<title>Data Pegawai</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Pegawai</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
            <tr>
                <th width="5%">No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Unit Kerja</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Nomor Hp</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($pegawai as $item)
			<tr>
                <td>{{ $i++ }}</td>
                <td>{{$item['nip']}}</td>
                <td>{{$item['nama']}}</td>
                <td>{{$item['unitkerja_nama']}}</td>
                <td>{{$item['jabatan']}}</td>
                <td>{{$item['status_pegawai']}}</td>
                <td>{{$item['no_telp']}}</td>
                <td>{{$item['agama']}}</td>
                <td>{{$item['gender']}}</td>
                <td>{{$item['alamat']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>