<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Form Entri (Jadwal Kuliah)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('haljadwalkuliah/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_jadwalkuliah" value="<?= $id_jadwalkuliah ?>">                    
                    
                    <div class="row mb-2">
                        <label class="col-4">Hari Kuliah</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_hari" required>
                                <?php if(!empty($detail_jadwalkuliah->hari_kuliah)) { ?>
                                <option value="<?= $detail_jadwalkuliah->hari_kuliah ?>"><?= $detail_jadwalkuliah->hari_kuliah ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Pilih --</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-4">Jam Kuliah</label>
                        <div class="col-8">
                            <small><i>mulai</i></small>
                            <input class="form-control" type="time" name="inputan_jam_mulai" required value="<?= substr($detail_jadwalkuliah->jam_kuliah, 0, 5)  ?>">
                            <small><i>selesai</i></small>
                            <input class="form-control" type="time" name="inputan_jam_selesai" required value="<?= substr($detail_jadwalkuliah->jam_kuliah, -5, 5) ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Tempat Kuliah</label>
                        <div class="col-8">
                            <textarea class="form-control" name="inputan_tempat" required><?= $detail_jadwalkuliah->tempat_kuliah ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Dosen Pengampu</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_dosen" required>
                                <?php if(!empty($detail_jadwalkuliah->id_dosen)) { ?>
                                <option value="<?= $detail_jadwalkuliah->id_dosen ?>"><?= $detail_jadwalkuliah->nidn_dosen.' - '.$detail_jadwalkuliah->nama_dosen ?></option>
                                <?php } ?>
                                
                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_dosen as $dosen) { ?>
                                <option value="<?= $dosen['id_dosen'] ?>"><?= $dosen['nidn_dosen'].' - '.$dosen['nama_dosen'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mahasiswa</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_mahasiswa" required>
                                <?php if(!empty($detail_jadwalkuliah->id_mahasiswa)) { ?>
                                <option value="<?= $detail_jadwalkuliah->id_mahasiswa ?>"><?= $detail_jadwalkuliah->nim_mahasiswa.' - '.$detail_jadwalkuliah->nama_mahasiswa ?></option>
                                <?php } ?>
                                
                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_mahasiswa as $mahasiswa) { ?>
                                <option value="<?= $mahasiswa['id_mahasiswa'] ?>"><?= $mahasiswa['nim_mahasiswa'].' - '.$mahasiswa['nama_mahasiswa'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Button atau tombol -->

                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('haljadwalkuliah') ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Tabel Data (Jadwal Kuliah)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Waktu Kuliah</th>
                            <th>Tempat Kuliah</th>
                            <th>Nama Mahasiswa</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_jadwalkuliah as $jadwalkuliah) { ?>
                        <tr style="font-size: smaller;">
                            <td><?= $no++ ?></td>
                            <td><?= $jadwalkuliah['hari_kuliah'].', '.$jadwalkuliah['jam_kuliah'] ?></td>
                            <td>
                                <?= $jadwalkuliah['tempat_kuliah'].'<br><b>Dosen : </b>'.$jadwalkuliah['nama_dosen'] ?>
                                <hr style="margin : 0">
                                Tgl. Entri (<?= $jadwalkuliah['tanggal_entri'] ?>)
                            </td>
                            <td><?= $jadwalkuliah['nama_mahasiswa'].' ('.$jadwalkuliah['jk_mahasiswa'].')'.'<br><b>Alamat : </b>'.$jadwalkuliah['alamat_mahasiswa'] ?></td>
                            <td>
                                <a href="<?= base_url('haljadwalkuliah/detaildata/'.$jadwalkuliah['id_jadwalkuliah']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('haljadwalkuliah/hapusdata/'.$jadwalkuliah['id_jadwalkuliah']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>