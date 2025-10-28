<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Form Entri (Mahasiswa)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('halmahasiswa/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_mahasiswa" value="<?= $id_mahasiswa ?>">                    
                    
                    <div class="row mb-2">
                        <label class="col-4">NIM</label>
                        <div class="col-8">
                            <input class="form-control" type="number" name="inputan_nim" required value="<?= $detail_mahasiswa->nim_mahasiswa ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama" required value="<?= $detail_mahasiswa->nama_mahasiswa ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Jenis Kelamin</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_jk" required>
                                <?php if(!empty($detail_mahasiswa->jk_mahasiswa)) { ?>
                                <option value="<?= $detail_mahasiswa->jk_mahasiswa ?>"><?= $detail_mahasiswa->jk_mahasiswa ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Tgl. Lahir</label>
                        <div class="col-8">
                            <input class="form-control" type="date" name="inputan_tgl_lahir" required value="<?= $detail_mahasiswa->tgl_lahir_mahasiswa ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Alamat</label>
                        <div class="col-8">
                            <textarea class="form-control" name="inputan_alamat" required><?= $detail_mahasiswa->alamat_mahasiswa ?></textarea>
                        </div>
                    </div>

                    <!-- Button atau tombol -->

                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('halmahasiswa') ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Tabel Data (Mahasiswa)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Informasi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_mahasiswa as $mahasiswa) { ?>
                        <tr style="font-size: smaller;">
                            <td><?= $no++ ?></td>
                            <td><?= $mahasiswa['nim_mahasiswa'] ?></td>
                            <td><?= $mahasiswa['nama_mahasiswa'].' ('.$mahasiswa['jk_mahasiswa'].')' ?></td>
                            <td><?= '<b>Lahir : </b>'.$mahasiswa['tgl_lahir_mahasiswa'].'<br><b>Alamat : </b>'.$mahasiswa['alamat_mahasiswa'] ?></td>
                            <td>
                                <a href="<?= base_url('halmahasiswa/detaildata/'.$mahasiswa['id_mahasiswa']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('halmahasiswa/hapusdata/'.$mahasiswa['id_mahasiswa']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>