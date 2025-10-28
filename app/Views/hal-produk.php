
<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Form Entri (Produk)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('halproduk/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_produk" value="<?= $id_produk ?>">                    
                    
                    <?php if(empty($id_produk)){ ?> 
                        <center><i class="fa fa-user fa-5x mb-4"></i></center>
                    <?php } else { ?> 
                        <center><img src="<?= base_url().'/public/foto-produk/'.$detail_produk->foto_produk ?>" class="mb-4" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                    <?php } ?>
                    
                    <div class="row mb-2">
                        <label class="col-4">Nama</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama_produk" required value="<?= $detail_produk->nama_produk ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="Jenis" class="col-4">Jenis Produk</label>
                        <div class="col-8">
                        <select class="form-control" name="inputan_jenis_produk" required>
                            <?php if (!empty($detail_produk->jenis_produk)) { ?>
                            <option value="<?= $detail_produk->jenis_produk ?>"><?= $detail_produk->jenis_produk ?></option>
                            <?php } else { ?>
                            <option value=""> -- Silahkan Pilih --</option>
                            <?php } ?>
                            <option value="Bomber">Bomber</option>
                            <option value="Hoodie">Hoodie</option>
                            <option value="Parka">Parka</option>
                        </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="Jenis" class="col-4">Ukuran Produk</label>
                        <div class="col-8">
                        <select class="form-control" name="inputan_ukuran_produk" required>
                            <?php if (!empty($detail_produk->ukuran_produk)) { ?>
                            <option value="<?= $detail_produk->ukuran_produk ?>"><?= $detail_produk->ukuran_produk ?></option>
                            <?php } else { ?>
                            <option value=""> -- Silahkan Pilih --</option>
                            <?php } ?>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="Stok" class="col-4">Stok Produk</label>
                        <div class="col-8">
                        <input class="form-control" type="number" name="inputan_stok_produk" required
                            value="<?= $detail_produk->stok_produk ?>" placeholder="input stok produk">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="Harga" class="col-4">Harga Produk</label>
                        <div class="col-8">
                        <input class="form-control" type="number" name="inputan_harga_produk" required
                            value="<?= $detail_produk->harga_produk ?>" placeholder="input harga produk">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Foto Produk</label>
                        <div class="col-8">
                            <input class="form-control" type="file" name="inputan_foto">
                            <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $detail_produk->foto_produk ?>">
                        </div>
                    </div>

                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('halproduk'); ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Tabel Data (Produk)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Ukuran</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_produk as $produk) { ?>
                        <tr style="font-size: smaller;">
                            <td><?= $no++ ?></td>
                            <td><?= $produk['nama_produk'] ?></td>
                            <td><?= $produk['jenis_produk'] ?></td>
                            <td><?= $produk['ukuran_produk'] ?></td>
                            <td><?= $produk['stok_produk'] ?></td>
                            <td><?= $produk['harga_produk'] ?></td>
                            <td>
                                <img src="<?= base_url().'/public/foto-produk/'.$produk['foto_produk'] ?>" height="100%" width="25px" style="border: 2.5px solid grey;">
                            </td>
                            
                            <td>
                                <a href="<?= base_url('halproduk/detaildata/'.$produk['id_produk']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('halproduk/hapusdata/'.$produk['id_produk']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>