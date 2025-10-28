<center>
  <h4 class="mb-4" style="font-family: 'Sofia', sans-serif; font-weight: bold;">
    <i class="fa fa-print"></i> Halaman Cetak Laporan
  </h4>
</center>

<div class="row">
  <div class="col-12">
      <div class="card border-success">
          <h5 class="card-header bg-success text-white">Pilihan Laporan</h5>
          <div class="card-body">
            
            <!-- Area form cetak laporan -->
            <form action="<?= base_url('hallaporan/laporanjadwalkuliah') ?>" method="post" target="new">
            <div class="row mb-2">
              <label class="col-4"><b>Laporan Transaksi</b> </label>
              <div class="col-3">
                <input class="form-control" type="date" name="inputan_tgl_mulai" required>
                <small><b>Tgl. Mulai</b></small>
              </div>
              <div class="col-3">
                <input class="form-control" type="date" name="inputan_tgl_selesai" required>
                <small><b>Tgl. Selesai</b></small>
              </div>
              <div class="col-2">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</button>
              </div>
            </div>
            </form>
            <!-- Area form cetak laporan -->

          </div>
        </div>
  </div>
</div>