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
            <div class="card-header"><strong>Tabel Data Penjualan</strong></div>
            <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Produk</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Jumlah Jual</th>
                                <th>Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $totaljual = 0;
                        $totalharga = 0;
                        $total_pendapatan = 0;
                        
                        // Array untuk menyimpan data produk yang sudah digabungkan
                        $mergedProducts = [];

                        foreach ($data_penjualan as $transaksi) {
                            $id_produk = $transaksi['id_produk'];
                            $id_transaksi = $transaksi['id_transaksi']; // Tambahkan id_transaksi

                            // Cek apakah ID produk dan ID transaksi sudah ada di array $mergedProducts
                            if (array_key_exists($id_produk, $mergedProducts) && array_key_exists($id_transaksi, $mergedProducts[$id_produk]['transaksi'])) {
                                // Jika sudah ada, tambahkan jumlah dan subharga
                                $mergedProducts[$id_produk]['transaksi'][$id_transaksi]['jumlah'] += $transaksi['jumlah'];
                                $mergedProducts[$id_produk]['transaksi'][$id_transaksi]['subharga'] += $transaksi['harga_produk'] * $transaksi['jumlah'];
                            } else {
                                // Jika belum ada, tambahkan produk dan transaksi ke array
                                $mergedProducts[$id_produk]['id_produk'] = $id_produk;
                                $mergedProducts[$id_produk]['nama_produk'] = $transaksi['nama_produk'];
                                $mergedProducts[$id_produk]['harga_produk'] = $transaksi['harga_produk'];
                                $mergedProducts[$id_produk]['stok_produk'] = $transaksi['stok_produk'];

                                // Menambahkan data transaksi
                                $mergedProducts[$id_produk]['transaksi'][$id_transaksi] = [
                                    'jumlah' => $transaksi['jumlah'],
                                    'subharga' => $transaksi['harga_produk'] * $transaksi['jumlah'],
                                ];
                            }

                            // Hitung total harga
                            $totalharga += $transaksi['harga_produk'];

                            // Hitung total penjualan dan pendapatan
                            $totaljual += $transaksi['jumlah'];
                            $total_pendapatan += $transaksi['harga_produk'] * $transaksi['jumlah'];
                        }

                        // Loop untuk menampilkan hasil penggabungan
                        foreach ($mergedProducts as $product) {
                        ?>
                            <tr>
                                <td class="text-center"><?= ++$no ?></td>
                                <td class="text-center"><?= $product['id_produk'] ?></td>
                                <td><?= $product['nama_produk'] ?></td>
                                <td class="text-center"><a>Rp. <?= number_format($product['harga_produk'], 2, ',', '.') ?></a></td>
                                <td class="text-center"><?= $product['stok_produk'] ?></td>
                                <td class="text-center"><?= array_sum(array_column($product['transaksi'], 'jumlah')) ?></td>
                                <td class="text-center"><a>Rp. <?= number_format(array_sum(array_column($product['transaksi'], 'subharga')), 2, ',', '.') ?></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="right"><strong>Total Keseluruhan : </strong></td>
                            <td class="text-center"><?php echo array_sum(array_column($mergedProducts, 'stok_produk')) ?></td>
                            <td class="text-center"><?php echo $totaljual ?></td>
                            <td class="text-center">Rp. <?= number_format($total_pendapatan, 2, ',', '.') ?></td>
                        </tr>
                    </tfoot>
                    </table>
            </div>
        </div>
    </div>
</div>
</body>
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
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>