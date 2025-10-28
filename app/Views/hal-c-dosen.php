<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Form Entri (dosen)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('haldosen/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_dosen" value="<?= $id_dosen ?>">                    
                    
                    <?php if(empty($id_dosen)){ ?> 
                        <center><i class="fa fa-user fa-5x mb-4"></i></center>
                    <?php } else { ?> 
                        <center><img src="<?= base_url().'/public/foto-dosen/'.$detail_dosen->foto_dosen ?>" class="mb-4" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                    <?php } ?>
                    
                    <div class="row mb-2">
                        <label class="col-4">NIDN</label>
                        <div class="col-8">
                            <input class="form-control" type="number" name="inputan_nidn" required value="<?= $detail_dosen->nidn_dosen ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-4">Nama</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama" required value="<?= $detail_dosen->nama_dosen ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Foto Dosen</label>
                        <div class="col-8">
                            <input class="form-control" type="file" name="inputan_foto">
                            <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $detail_dosen->foto_dosen ?>">
                        </div>
                    </div>

                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('haldosen'); ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Tabel Data (dosen)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_dosen as $dosen) { ?>
                        <tr style="font-size: smaller;">
                            <td><?= $no++ ?></td>
                            <td><?= $dosen['nidn_dosen'] ?></td>
                            <td><?= $dosen['nama_dosen'] ?></td>
                            <td>
                                <img src="<?= base_url().'/public/foto-dosen/'.$dosen['foto_dosen'] ?>" height="100%" width="25px" style="border: 2.5px solid grey;">
                            </td>
                            <td>
                                <a href="<?= base_url('haldosen/detaildata/'.$dosen['id_dosen']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('haldosen/hapusdata/'.$dosen['id_dosen']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>