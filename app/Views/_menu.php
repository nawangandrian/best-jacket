
<center style="margin-top: -30px;"><a hidden> Menu Pengguna (<?= $session->get('hak_akses') ?>) - </a></center>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="<?= base_url('halberanda') ?>">THE NEW AVENUE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if($session->get('hak_akses') == 'Admin'){ ?>

                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('halberanda') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('halproduk'); ?>">Produk <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('haluser'); ?>">Pengguna <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('tabtransaksi'); ?>">Transaksi <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('haljual'); ?>">Penjualan <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('halmasuk/keluar'); ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')">Keluar<span class="sr-only">(current)</span></a>
                </li>

                <?php } if($session->get('hak_akses') == 'Kasir'){ ?>

                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('halberanda') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('halproduk'); ?>">Produk <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('tabtransaksi'); ?>">Transaksi <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('haljual'); ?>">Penjualan <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('halmasuk/keluar'); ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')">Keluar<span class="sr-only">(current)</span></a>
                </li>

                <?php } ?>
            </ul>
        </div>
    </nav>

    