<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
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
        </div>
        <hr>
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-header"><strong>Laporan Transaksi</strong></div>
            <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">ID Transaksi</th>
                                <th class="text-center">Nama Pengguna</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($data_transaksi as $transaksi) { 
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $transaksi['id_transaksi'] ?></td>
                                    <td><?= $transaksi['nama_pengguna'] ?></td>
                                    <td class="text-center"><a><?= $transaksi['tgl_transaksi'] ?> Pukul <?= $transaksi['jam_transaksi'] ?></a></td>
                                    <td><a>Rp. <?= number_format($transaksi['total_transaksi'], 2, ',', '.') ?></a></td>
                                </tr>
                                <?php 
                                // Menambahkan nilai total_transaksi pada setiap iterasi
                                $total_pendapatan += $transaksi['total_transaksi'];
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" align="right"><strong>Total Penjualan : </strong></td>
                                <td>Rp. <?= number_format($total_pendapatan, 2, ',', '.') ?></td>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
    </div>
</div>
<br>
<div style="margin-left: 50rem;">
    <?php
		$session = \Config\Services::session();
		$nama_pengguna = $session->get('nama_pengguna');
        $alamat_pengguna = $session->get('alamat_pengguna');

		if (!empty($nama_pengguna)) {
    ?>
        <a>Tanda tangan,</a><br>
        <b>Kudus, <?= date("d-m-y"); ?></b>
            <br><br><br><br>
        <u><?= $nama_pengguna ?></u>
    <?php
     } ?>
</div>
</body>
<script>
//perintah untuk cetak di browser
    window.print();

// kembali ke halaman sebelumnya setelah mencetak
    window.onafterprint = function () {
        window.history.back();}
</script>