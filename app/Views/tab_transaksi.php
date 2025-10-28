<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"><link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<body style="background-image: url('img/bg10.jpg'); background-size: cover; background-position: center; background-repeat: repeat; margin-top: 4rem;">

<!-- <center style="margin-top: 3.5%; margin-bottom: 1.5%;">
    <h1 style="font-family: 'Sofia', sans-serif; font-weight: bold;"><?= $judul; ?></h1>
    <h1 style="font-family: 'Abril Fatface', sans-serif; font-weight: bold;"><?= $sub_judul1; ?></h1>
    <h4><?= $sub_judul; ?></h4>
</center> -->

<div class="container">
        <div class="clearfix">
            <div class="float-left">
                <h1 class="h3 m-0 text-gray-800"><?= $judul; ?></h1>
            </div>
            
            <div class="float-right">
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#transaksimodal"><i class="fa fa-file-pdf"></i> Export</button>
			</div>
            
        </div>
        <hr>
        <div class="card shadow" style="margin-bottom: 20px;">
            <div class="card-header"><strong>Tabel Data Transaksi</strong></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabel_data">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">ID Transaksi</th>
                                <th class="text-center">Nama Pengguna</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_transaksi as $transaksi) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $transaksi['id_transaksi'] ?></td>
                                <td><?= $transaksi['nama_pengguna'] ?></td>
                                <td class="text-center"><a><?= $transaksi['tgl_transaksi'] ?> Pukul <?= $transaksi['jam_transaksi'] ?></a></td>
                                <td><a>Rp. <?= number_format($transaksi['total_transaksi'], 2, ',', '.') ?></a></td>
                                <?php
									$session = \Config\Services::session();
								    $hak_akses = $session->get('hak_akses');

									if ($hak_akses == 'Kasir') { ?>
										<td>
                                            <a class="btn btn-sm btn-success" href="<?= base_url('haldetail/tampilltran?id_transaksi=' . $transaksi['id_transaksi']); ?>"><i class="fa fa-eye"></i></a>
                                            <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('tabtransaksi/hapusdata/'.$transaksi['id_transaksi']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
									<?php } else { ?>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="<?= base_url('haldetail/tampilltran?id_transaksi=' . $transaksi['id_transaksi']); ?>"><i class="fa fa-eye"></i></a>
                                        </td>
                                <?php
                                    }
								?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <?php
				$session = \Config\Services::session();
				$hak_akses = $session->get('hak_akses');

				if ($hak_akses == 'Kasir') { ?>
                <!-- Button trigger modal -->
                <button type="submit" class="btn btn-outline-primary btn-block" onclick="window.location.href='<?= base_url('haltransaksi'); ?>'">
                    Tambah Data Transaksi
                </button>
                <?php } else { ?> <?php } ?>
            </div>
        </div>
    </div>
</div>
</body>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright © <a href="https://instagram.com/nawang_andrian" target="_blank">Nawang Alan Andrian</a></span>
		</div>
	</div>
</footer>
        <!-- Modal -->
        <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="printModalLabel">Print Data Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda ingin mencetak Laporan Transaksi?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="printData()">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="transaksimodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Laporan Transaksi</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('ptransaksi/laporantransaksi'); ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                            <input class="form-control" type="date" name="inputan_tgl_mulai" required>
                            <small><b>Tgl. Mulai</b></small>
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="date" name="inputan_tgl_selesai" required>
                            <small><b>Tgl. Selesai</b></small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" name="saveproduk" class="btn btn-primary">Cetak</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function printData() {
                // perintah untuk cetak di browser
                window.location.href="<?= base_url('ptransaksi') ?>";
            }
        </script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>