<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
<body style="background-image: url('img/bg10.jpg'); background-size: cover; background-position: center; background-repeat: repeat; margin-top: 2rem;">

<!-- <center style="margin-top: 3.5%; margin-bottom: -1.5%;">
    <h1 style="font-family: 'Sofia', sans-serif; font-weight: bold;"><?= $judul; ?></h1>
    <h1 style="font-family: 'Abril Fatface', sans-serif; font-weight: bold;"><?= $sub_judul1; ?></h1>
    <h4><?= $sub_judul; ?></h4>
</center> -->
<div style="padding: 2.5%;">
<div class="clearfix">
            <div class="float-left">
                <h1 class="h3 m-0 text-gray-800"><?= $judul; ?></h1>
            </div>
        </div>
        <hr>
<div class="row">
    <div class="col-5">
        <div class="card shadow">
            <div class="card-header"><strong>Form Entry Data Pengguna</strong></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('haluser/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_pengguna" value="<?= $id_pengguna ?>">                    
                    
                    <div class="row mb-2">
                        <label class="col-4">Nama Pengguna</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama_pengguna" required value="<?= $detail_pengguna->nama_pengguna ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Password</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_pw_pengguna" required value="<?= $detail_pengguna->pw_pengguna ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Jenis Kelamin</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_jk_pengguna" required>
                                <?php if(!empty($detail_pengguna->jk_pengguna)) { ?>
                                <option value="<?= $detail_pengguna->jk_pengguna ?>"><?= $detail_pengguna->jk_pengguna ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Pilih --</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Hak Akses</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_hak_akses" required>
                                <?php if(!empty($detail_pengguna->hak_akses)) { ?>
                                <option value="<?= $detail_pengguna->hak_akses ?>"><?= $detail_pengguna->hak_akses ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Pilih --</option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Alamat</label>
                        <div class="col-8">
                            <textarea class="form-control" name="inputan_alamat_pengguna" required><?= $detail_pengguna->alamat_pengguna ?></textarea>
                        </div>
                    </div>

                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('haluser'); ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card shadow">
            <div class="card-header"><strong>Tabel Data Pengguna</strong></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>JK</th>
                            <th>Alamat</th>
                            <th>Hak Akses</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_pengguna as $pengguna) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pengguna['nama_pengguna'] ?></td>
                            <td><?= $pengguna['pw_pengguna'] ?></td>
                            <td><?= $pengguna['jk_pengguna'] ?></td>
                            <td><?= $pengguna['alamat_pengguna'] ?></td>
                            <td><?= $pengguna['hak_akses'] ?></td>
                            <td>
                                <a href="<?= base_url('haluser/detaildata/'.$pengguna['id_pengguna']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('haluser/hapusdata/'.$pengguna['id_pengguna']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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