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
        <div class="card shadow" style="margin-bottom: 20px;">
            <div class="card-header"><strong>Tabel Data Produk</strong></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabel_data">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Ukuran</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Foto</th>
                                <?php
                                $session = \Config\Services::session();
                                $hak_akses = $session->get('hak_akses');

                                if ($hak_akses == 'Admin') { ?>
                                <th class="text-center">Opsi</th>
                                <?php } else { ?>
											
                                <?php
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_produk as $produk) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $produk['nama_produk'] ?></td>
                                <td><?= $produk['jenis_produk'] ?></td>
                                <td class="text-center"><?= $produk['ukuran_produk'] ?></td>
                                <td class="text-center"><?= $produk['stok_produk'] ?></td>
                                <td class="text-center"><a>Rp. <?= number_format($produk['harga_produk'], 2, ',', '.') ?></a></td>
                                <td class="text-center">
                                    <img src="<?= base_url().'/public/foto-produk/'.$produk['foto_produk'] ?>" height="100%" width="25px" style="border: 2.5px solid grey;">
                                </td>
                                <?php
                                $session = \Config\Services::session();
                                $hak_akses = $session->get('hak_akses');

                                if ($hak_akses == 'Admin') { ?>
                                <td>
                                    <a href="<?= base_url('halproduk/detaildata/'.$produk['id_produk']) ?>"
                                        class="btn btn-success" onclick="Edit()" data-toggle="modal"
                                        data-target="#editprodukmodal<?= $produk['id_produk'] ?>"><i
                                            class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin hapus ?')"
                                        href="<?= base_url('halproduk/hapusdata/'.$produk['id_produk']) ?>"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                                <?php } else { ?>
											
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

                    if ($hak_akses == 'Admin') { ?>
                <!-- Button trigger modal -->
                <button class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#produkmodal">
                    Tambah Data Produk
                </button>
                <a href="<?= base_url('halproduk'); ?>" class="btn btn-danger btn-block"><i
                        class="fa fa-refresh fa-spin"></i> Muat Ulang</a>
                <?php } else { ?>
											
                <?php
                    }
                ?>
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
<div class="modal fade" id="produkmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('halproduk/simpandata'); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <input class="form-control" type="text" name="inputan_id_produk" value="<?= $id_produk ?>"
                        hidden>

                    <?php if(empty($id_produk)){ ?> 
                        <center><i class="fa fa-picture-o fa-5x mb-4"></i></center>
                    <?php } else { ?> 
                        <center><img src="<?= base_url().'/public/foto-produk/'.$foto_produk ?>" class="mb-4" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                    <?php } ?>

                    <div class="form-group">
                        <label for="Nama">Nama Produk</label>
                        <input class="form-control" type="text" name="inputan_nama_produk" autocomplete="off"
                            placeholder="input nama produk">
                    </div>
                    <div class="form-group">
                        <label for="Jenis">Jenis Produk</label>
                        <select class="form-control" name="inputan_jenis_produk" required>
                            <option value=""> -- Silahkan Pilih --</option>
                            <option value="Bomber">Bomber</option>
                            <option value="Hoodie">Hoodie</option>
                            <option value="Parka">Parka</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Jenis">Ukuran Produk</label>
                        <select class="form-control" name="inputan_ukuran_produk" required>
                            <option value=""> -- Silahkan Pilih --</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Stok">Stok Produk</label>
                        <input class="form-control" type="number" name="inputan_stok_produk"
                            placeholder="input stok produk">
                    </div>
                    <div class="form-group">
                        <label for="Harga">Harga Produk</label>
                        <input class="form-control" type="number" name="inputan_harga_produk"
                            placeholder="input harga produk">
                    </div>
                    <div class="form-group">
                        <label for="Foto">Foto Produk</label>                     
                        <input class="form-control" type="file" name="inputan_foto">
                        <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $foto_produk ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="saveproduk" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($data_produk as $produk) { ?>
<div class="modal fade" id="editprodukmodal<?= $produk['id_produk'] ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('halproduk/updateproduk/'.$produk['id_produk']); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="inputan_id_produk" value="<?= $produk['id_produk'] ?>" 
                        class="form-control" hidden>

                    <?php if(empty($produk['id_produk'])){ ?> 
                        <center><i class="fa fa-picture-o fa-5x mb-4"></i></center>
                    <?php } else { ?> 
                        <center><img src="<?= base_url().'/public/foto-produk/'.$produk['foto_produk'] ?>" class="mb-4" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                    <?php } ?>

                    <div class="form-group">
                        <label for="Nama">Nama Produk</label>
                        <input class="form-control" type="text" name="inputan_nama_produk" required
                            value="<?= $produk['nama_produk'] ?>" autocomplete="off"
                            placeholder="input nama produk">
                    </div>
                    <div class="form-group">
                        <label for="Jenis">Jenis Produk</label>
                        <select class="form-control" name="inputan_jenis_produk" required>
                            <?php if (!empty($produk['jenis_produk'])) { ?>
                            <option value="<?= $produk['jenis_produk'] ?>"><?= $produk['jenis_produk'] ?></option>
                            <?php } else { ?>
                            <option value=""> -- Silahkan Pilih --</option>
                            <?php } ?>
                            <option value="Bomber">Bomber</option>
                            <option value="Hoodie">Hoodie</option>
                            <option value="Parka">Parka</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Jenis">Ukuran Produk</label>
                        <select class="form-control" name="inputan_ukuran_produk" required>
                            <?php if (!empty($produk['ukuran_produk'])) { ?>
                            <option value="<?= $produk['ukuran_produk'] ?>"><?= $produk['ukuran_produk'] ?></option>
                            <?php } else { ?>
                            <option value=""> -- Silahkan Pilih --</option>
                            <?php } ?>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Stok">Stok Produk</label>
                        <input class="form-control" type="number" name="inputan_stok_produk" required
                            value="<?= $produk['stok_produk'] ?>" placeholder="input stok produk">
                    </div>
                    <div class="form-group">
                        <label for="Harga">Harga Produk</label>
                        <input class="form-control" type="number" name="inputan_harga_produk" required
                            value="<?= $produk['harga_produk'] ?>" placeholder="input harga produk">
                    </div>
                    <div class="form-group">
                        <label for="Foto">Foto Produk</label>                     
                            <input class="form-control" type="file" name="inputan_foto">
                            <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $produk['foto_produk']  ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="saveproduk" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>