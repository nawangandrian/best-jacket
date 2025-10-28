<!-- view/keranjang.php -->

<tr class="row-keranjang">
    <td class="nama_produk">
        <?= $nama_produk ?? '' ?>
        <input type="hidden" name="nama_produk_hidden[]" value="<?= $nama_produk ?? '' ?>">
    </td>
    <td class="harga_produk">
        <?= $harga_produk ?? '' ?>
        <input type="hidden" name="harga_produk_hidden[]" value="<?= $harga_produk ?? '' ?>">
    </td>
    <td class="ukuran">
        <?= strtoupper($ukuran_produk ?? '') ?>
        <input type="hidden" name="ukuran_produk_hidden[]" value="<?= $ukuran_produk ?? '' ?>">
    </td>
    <td class="jumlah">
        <?= $jumlah ?? '' ?>
        <input type="hidden" name="jumlah_hidden[]" value="<?= $jumlah ?? '' ?>">
    </td>
    <td class="sub_total">
        <?= $sub_total ?? '' ?>
        <input type="hidden" name="sub_total_hidden[]" value="<?= $sub_total ?? '' ?>">
    </td>
    <td class="aksi">
		<input type="hidden" name="id_produk_hidden[]" value="<?= $id_produk ?? '' ?>">
        <button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-produk="<?= $nama_produk ?? '' ?>">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
