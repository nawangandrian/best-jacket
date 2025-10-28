    <link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<body style="background-image: url('img/bg10.jpg'); background-size: cover; background-position: center; background-repeat: repeat; overflow-x: hidden; margin-top: 4rem;">
            <div id="content" data-url="<?= base_url('pdetail') ?>">

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800">Nota Transaksi</h1>
					</div>
				</div>
				<hr>
				<div class="card">
					<div class="card-header"><strong>Detail Transaksi</strong>
                    </div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<table class="table table-borderless">
                                    <?php 
                                    if (!empty($detail_datatransaksi)) {
                                        $dat = $detail_datatransaksi[0];
                                    ?>
									<tr>
										<td><strong>No Penjualan</strong></td>
										<td>:</td>
										<td><?= $dat['id_transaksi'] ?></td>
									</tr>
									<tr>
                                        <?php
                                        if ($dat['hak_akses'] == 'Admin') { ?>
										    <td><strong>Nama Admin</strong></td>
                                        <?php } else { ?>
                                            <td><strong>Nama Kasir</strong></td>
                                        <?php
                                            }
                                        ?>
										<td>:</td>
										<td><?= $dat['nama_pengguna'] ?></td>
									</tr>
                                        <tr>
                                            <td><strong>Waktu Penjualan</strong></td>
                                            <td>:</td>
                                            <td><?= $dat['tgl_transaksi'] ?> Pukul <?= $dat['jam_transaksi'] ?></td>
                                        </tr>
                                    <?php 
                                    }
                                    ?>
								</table>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center"><strong>No</strong></td>
                                        <td class="text-center"><strong>Nama Barang</strong></td>
                                        <td class="text-center"><strong>Harga Barang</strong></td>
                                        <td class="text-center"><strong>Jumlah</strong></td>
                                        <td class="text-center"><strong>Sub Total</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_transaksi = 0; // Inisialisasi total_transaksi
                                    $combined_data = []; // Initialize array to combine rows with the same product name

                                    foreach ($detail_datatransaksi as $index => $product) {
                                        $product_name = $product['nama_produk'];

                                        if (!isset($combined_data[$product_name])) {
                                            // If the product name is not in the combined_data array, add it
                                            $combined_data[$product_name] = [
                                                'index' => $index,
                                                'jumlah' => $product['jumlah'],
                                                'sub_total' => $product['sub_total'],
                                            ];
                                        } else {
                                            // If the product name is already in the combined_data array, update jumlah and sub_total
                                            $combined_data[$product_name]['jumlah'] += $product['jumlah'];
                                            $combined_data[$product_name]['sub_total'] += $product['sub_total'];
                                        }
                                    }

                                    foreach ($combined_data as $product_name => $combined_product) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $combined_product['index'] + 1 ?></td>
                                            <td><?= $product_name ?></td>
                                            <td class="text-center">Rp. <?= number_format($detail_datatransaksi[$combined_product['index']]['harga_produk'], 2, ',', '.')  ?></td>
                                            <td class="text-center"><?= $combined_product['jumlah']?></td>
                                            <td>Rp. <?= number_format($combined_product['sub_total'], 2, ',', '.') ?></td>
                                        </tr>
                                        <?php
                                        // Akumulasi nilai total_transaksi
                                        $total_transaksi += $combined_product['sub_total'];
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" align="right"><strong>Total : </strong></td>
                                        <td>Rp. <?= number_format($total_transaksi, 2, ',', '.') ?></td>
                                    </tr>
                                </tfoot>
                            </table>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
            <br>
            <div style="margin-left: 50rem;">
                <?php 
                    if (!empty($detail_datatransaksi)) {
                        $dat = $detail_datatransaksi[0];
                ?>
                            <a>Tanda tangan,</a><br>
                            <b>Kudus, <?= date("d-m-y"); ?></b>
                                <br><br><br><br>
                            <u><?= $dat['nama_pengguna'] ?></u>
                <?php } ?>
            </div>
        </body>
        <script>
        //perintah untuk cetak di browser
        window.print();

            // kembali ke halaman sebelumnya setelah mencetak
            window.onafterprint = function () {
                window.history.back();}
        </script>