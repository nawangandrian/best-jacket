<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak - Laporan Jadwal Kuliah</title>
	<!-- data tables css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<div style="height: 20px; width: 100%; background-color: green;"></div>
	<div class="m-5">
		<h1>Aplikasi UAS Rekayasa Web</h1>
		<h3>Laporan Jadwal Kuliah (<?= date("d/M, Y", strtotime($tanggal_cetak)) ?>)</h4>

		<table class="table table-bordered mt-5">
			<thead>
			    <tr>
			        <th>No.</th>
			        <th>Waktu Kuliah</th>
			        <th>Tempat Kuliah</th>
			        <th>Nama Mahasiswa</th>
			    </tr>
			</thead>
			<tbody>
			    <?php $no = 1; foreach ($data_jadwalkuliah as $jadwalkuliah) { ?>
			    <tr style="font-size: smaller;">
			        <td><?= $no++ ?></td>
			        <td><?= $jadwalkuliah['hari_kuliah'].', '.$jadwalkuliah['jam_kuliah'] ?></td>
			        <td>
			            <?= $jadwalkuliah['tempat_kuliah'].'<br><b>Dosen : </b>'.$jadwalkuliah['nama_dosen'] ?>
			            <hr style="margin : 0">
			            Tgl. Entri (<?= $jadwalkuliah['tanggal_entri'] ?>)
			        </td>
			        <td><?= $jadwalkuliah['nama_mahasiswa'].' ('.$jadwalkuliah['jk_mahasiswa'].')'.'<br><b>Alamat : </b>'.$jadwalkuliah['alamat_mahasiswa'] ?></td>
			    </tr>
			    <?php } ?>
			</tbody>
		</table>
	</div>

	<div style="height: 20px; width: 100%; background-color: black; position: absolute; bottom: 0;"></div>
</body>
</html>
<script type="text/javascript">
	window.print();
	window.onfocus = function(){ window.close(); }
</script>