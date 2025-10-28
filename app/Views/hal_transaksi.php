	<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<body style="background-image: url('img/bg10.jpg'); background-size: cover; background-position: center; background-repeat: repeat; overflow-x: hidden; margin-top: 4rem;">
	<div id="content" data-url="<?= base_url('haltransaksi') ?>">
	<div class="clearfix">
            <div class="float-left">
                <h1 class="h3 m-0 text-gray-800"><?= $judul; ?></h1>
            </div>
            <div class="float-right">
                <a href="<?= base_url('tabtransaksi') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
            </div>
    </div>
    <hr>
				<div class="row">
					<div class="col">
						<div class="card shadow" style="margin-bottom: 20px;">
							<div class="card-header"><strong>Form Entry Data Transaksi</strong></div>
							<div class="card-body">
								<form action="<?= base_url('haltransaksi/simpandata'); ?>" id="form-tambah" method="post">
									<h5>Data Pengguna</h5>
									<hr>
									
									<div class="form-row">
										<div class="form-group col-2">
											<label>No. Penjualan</label>
											<input type="text" name="inputan_id_transaksi" value="TR<?= time() ?>" readonly class="form-control">
										</div>
										<div class="form-group col-3">
										<label>Kode Kasir</label>
											<?php
											$session = \Config\Services::session();
											$id_pengguna = $session->get('id_pengguna');

											if (!empty($id_pengguna)) {
												echo '<input type="text" name="inputan_id_pengguna" value="' . $id_pengguna . '" readonly class="form-control">';
											} else {
												echo '<input type="text" name="inputan_id_pengguna" value="Tidak Ada Data" readonly class="form-control">';
											}
											?>
										</div>
										<div class="form-group col-3">
										<label>Nama Kasir</label>
											<?php
											$session = \Config\Services::session();
											$nama_pengguna = $session->get('nama_pengguna');

											if (!empty($nama_pengguna)) {
												echo '<input type="text" name="inputan_nama_pengguna" value="' . $nama_pengguna . '" readonly class="form-control">';
											} else {
												echo '<input type="text" name="inputan_nama_pengguna" value="Tidak Ada Data" readonly class="form-control">';
											}
											?>
										</div>
										<div class="form-group col-2">
											<label>Tanggal Penjualan</label>
											<input type="text" name="inputan_tgl_transaksi" value="<?= date('d/m/Y') ?>" readonly class="form-control">
										</div>
										<div class="form-group col-2">
											<label>Jam</label>
											<input type="text" name="inputan_jam_transaksi" id="inputan_jam_transaksi" readonly class="form-control">
										</div>
									</div>
									<h5>Data Barang</h5>
									<hr>
									<div class="form-row">
									<div class="form-group col-3">
    									<label for="nama_produk">Nama Barang</label>
											<select name="nama_produk" id="nama_produk" class="form-control">
												<option value="">Pilih Barang</option>
												<?php foreach ($data_produk as $produk): ?>
													<option value="<?= $produk['nama_produk'] ?>"><?= $produk['nama_produk'] ?></option>
												<?php endforeach ?>
											</select>
									</div>
										<div class="form-group col-2">
											<label>Id Produk</label>
											<input type="text" name="id_produk" value="" readonly class="form-control">
										</div>
										<div class="form-group col-2">
											<label>Harga Produk</label>
											<input type="text" name="harga_produk" value="" readonly class="form-control">
										</div>
										<div class="form-group col-2">
											<label>Jumlah</label>
											<input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
										</div>
										<div class="form-group col-2">
											<label>Sub Total</label>
											<input type="number" name="sub_total" value="" class="form-control" readonly>
										</div>
										<input type="hidden" name="ukuran_produk" value="">
										<div class="form-group col-1">
											<label for="">&nbsp;</label>
											<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
										</div>
										
									</div>
									<div class="keranjang">
										<h5>Detail Pembelian</h5>
										<hr>
											<table class="table table-bordered" id="keranjang">
												<thead>
													<tr>
														<td width="35%">Nama Produk</td>
														<td width="15%">Harga</td>
														<td width="15%">Ukuran</td>
														<td width="10%">Jumlah</td>
														<td width="10%">Sub Total</td>
														<td width="15%">Aksi</td>
													</tr>
												</thead>
												<tbody>
													<!-- Data dari keranjang akan ditampilkan di sini -->
												</tbody>
												<tfoot>
													<tr>
														<td colspan="4" align="right"><strong>Total : </strong></td>
														<td id="total"></td>
														<td>
															<!-- Menambah input fields untuk data dari tabel keranjang -->
															<input type="hidden" name="inputan_total_transaksi" value="">
															<input type="hidden" name="max_hidden" value="">
															<input type="hidden" name="id_produk_hidden[]" value="">
															<input type="hidden" name="nama_produk_hidden[]" value="">
															<input type="hidden" name="harga_produk_hidden[]" value="">
															<input type="hidden" name="jumlah_hidden[]" value="">
															<input type="hidden" name="ukuran_produk_hidden[]" value="">
															<input type="hidden" name="sub_total_hidden[]" value="">
															<div id="input-container"></div>
															<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
														</td>
													</tr>
												</tfoot>
											</table>
									</div>
								</form>
							</div>				
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
<script>
		$(document).ready(function () {
		$('tfoot').hide();

		$(document).keypress(function (event) {
			if (event.which === 13) {
				event.preventDefault();
			}
		});

		$('#nama_produk').on('change', function () {
			if ($(this).val() === '') reset();
			else {
				const url_get_produk_detail = '<?= base_url('haltransaksi/get_produk_detail') ?>';
				$.ajax({
					url: url_get_produk_detail,
					type: 'POST',
					dataType: 'json',
					data: { nama_produk: $(this).val() },
					success: function (data) {
						$('input[name="id_produk"]').val(data.id_produk);
						$('input[name="nama_produk"]').val(data.nama_produk);
						$('input[name="harga_produk"]').val(data.harga_produk);
						$('input[name="jumlah"]').val(1);
						$('input[name="ukuran_produk"]').val(data.ukuran_produk);
						$('input[name="max_hidden"]').val(data.stok_produk);
						$('input[name="jumlah"]').prop('readonly', false);
						$('button#tambah').prop('disabled', false);

						$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_produk"]').val());

						$('input[name="jumlah"]').on('keydown keyup change blur', function () {
							$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_produk"]').val());
						});
					}
				});
			}
		});

		$(document).on('click', '#tambah', function (e) {
			const url_keranjang_barang = '<?= base_url('haltransaksi/keranjang_barang') ?>';
			const data_keranjang = {
				nama_produk: $('select[name="nama_produk"]').val(),
				id_produk: $('input[name="id_produk"]').val(),
				harga_produk: $('input[name="harga_produk"]').val(),
				jumlah: $('input[name="jumlah"]').val(),
				ukuran_produk: $('input[name="ukuran_produk"]').val(),
				sub_total: $('input[name="sub_total"]').val(),
			};

			if (parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
				alert('Stok tidak tersedia! Stok tersedia: ' + parseInt($('input[name="max_hidden"]').val()));
			} else {
				$.ajax({
					url: url_keranjang_barang,
					type: 'POST',
					data: data_keranjang,
					success: function (data) {
						if ($('input[name="nama_produk"]').val() == data_keranjang.nama_produk) {
							$('option[value="' + data_keranjang.nama_produk + '"]').hide();
						}
						reset();

						$('table#keranjang tbody').append(data);
						$('tfoot').show();

						// Recalculate total after adding a new item
						updateTotal();
					}
				});
			}
		});

		function updateTotal() {
			let total = 0;
			$('.sub_total').each(function () {
				total += parseInt($(this).text());
			});

			$('#total').html('<strong>' + total + '</strong>');
			$('input[name="inputan_total_transaksi"]').val(total);
		}

		$(document).on('click', '#tombol-hapus', function () {
			$(this).closest('.row-keranjang').remove();

			$('option[value="' + $(this).data('nama-produk') + '"]').show();

			if ($('tbody').children().length == 0) $('tfoot').hide();

			// Recalculate total after deleting an item
			updateTotal();
		});

		$('button[type="submit"]').on('click', function () {
			// Ambil nilai dari input yang akan disimpan di dalam input tersembunyi
			const id_produk = $('input[name="id_produk"]').val();
			const nama_produk = $('input[name="nama_produk"]').val();
			const harga_produk = $('input[name="harga_produk"]').val();
			const jumlah = $('input[name="jumlah"]').val();
			const ukuran_produk = $('input[name="ukuran_produk"]').val();
			const sub_total = $('input[name="sub_total"]').val();

			// Set nilai input tersembunyi di dalam formulir
			$('input[name="id_produk_hidden"]').val(id_produk);
			$('input[name="nama_produk_hidden"]').val(nama_produk);
			$('input[name="harga_produk_hidden"]').val(harga_produk);
			$('input[name="jumlah_hidden"]').val(jumlah);
			$('input[name="ukuran_produk_hidden"]').val(ukuran_produk);
			$('input[name="sub_total_hidden"]').val(sub_total);

			// Nonaktifkan input fields
			$('input[name="id_produk"]').prop('disabled', true);
			$('input[name="nama_produk"]').prop('disabled', true);
			$('input[name="harga_produk"]').prop('disabled', true);
			$('input[name="jumlah"]').prop('disabled', true);
			$('input[name="sub_total"]').prop('disabled', true);
		});

		function reset() {
			$('input[name="id_produk"]').val('');
			$('input[name="nama_produk"]').val('');
			$('input[name="harga_produk"]').val('');
			$('input[name="jumlah"]').val('');
			$('input[name="ukuran_produk"]').val('');
			$('input[name="sub_total"]').val('');
		}
	});

	// Ambil waktu saat ini
	var currentTime = new Date();

	// Format waktu menjadi HH:mm:ss
	var formattedTime = currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();

	// Set nilai input jam menggunakan JavaScript
	document.getElementById('inputan_jam_transaksi').value = formattedTime;
</script>
