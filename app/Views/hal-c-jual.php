<!-- SB Admin 2 CSS and Bootstrap CSS -->
<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">

<!-- Include the Chart.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.0/Chart.min.js" crossorigin="anonymous"></script>

<!-- SB Admin 2 JavaScript and Bootstrap JS -->
<script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
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
            
            <div class="float-right">
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#printModal"><i class="fa fa-file-pdf"></i> Export</button>
			</div>
            
        </div>
        <hr>
        <div class="card shadow" style="margin-bottom: 20px;">
            <div class="card-header"><strong>Tabel Data Penjualan</strong></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabel_data">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Kode Produk</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Jumlah Jual</th>
                                <th class="text-center">Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $totaljual = 0;
                        $totalharga = 0;
                        $total_pendapatan = 0;
                        $bulanPendapatan = array();
                        $dataPendapatan = array();
                        $dataJual = array();
                        
                        // Array untuk menyimpan data produk yang sudah digabungkan
                        $mergedProducts = [];

                        foreach ($data_penjualan as $transaksi) {
                            $id_produk = $transaksi['id_produk'];
                            $id_transaksi = $transaksi['id_transaksi']; // Tambahkan id_transaksi

                            // Cek apakah ID produk dan ID transaksi sudah ada di array $mergedProducts
                            if (array_key_exists($id_produk, $mergedProducts) && array_key_exists($id_transaksi, $mergedProducts[$id_produk]['transaksi'])) {
                                // Jika sudah ada, tambahkan jumlah dan subharga
                                $mergedProducts[$id_produk]['transaksi'][$id_transaksi]['jumlah'] += $transaksi['jumlah'];
                                $mergedProducts[$id_produk]['transaksi'][$id_transaksi]['subharga'] += $transaksi['harga_produk'] * $transaksi['jumlah'];
                            } else {
                                // Jika belum ada, tambahkan produk dan transaksi ke array
                                $mergedProducts[$id_produk]['id_produk'] = $id_produk;
                                $mergedProducts[$id_produk]['nama_produk'] = $transaksi['nama_produk'];
                                $mergedProducts[$id_produk]['harga_produk'] = $transaksi['harga_produk'];
                                $mergedProducts[$id_produk]['stok_produk'] = $transaksi['stok_produk'];

                                // Menambahkan data transaksi
                                $mergedProducts[$id_produk]['transaksi'][$id_transaksi] = [
                                    'jumlah' => $transaksi['jumlah'],
                                    'subharga' => $transaksi['harga_produk'] * $transaksi['jumlah'],
                                ];
                            }

                            // Hitung total harga
                            $totalharga += $transaksi['harga_produk'];

                            // Hitung total penjualan dan pendapatan
                            $totaljual += $transaksi['jumlah'];
                            $total_pendapatan += $transaksi['harga_produk'] * $transaksi['jumlah'];
                        }

                        // Loop untuk menampilkan hasil penggabungan
                        foreach ($mergedProducts as $product) {
                            $nama_produk = $product['nama_produk'];
                            $jumlahjual = array_sum(array_column($product['transaksi'], 'jumlah'));
                            $subharga = array_sum(array_column($product['transaksi'], 'subharga'));
                            $bulanPendapatan[] = $nama_produk;
                            $dataPendapatan[] = $subharga;
                            $dataJual[] = $jumlahjual;
                            $stringjual = array_map('strval', $dataJual);
                        ?>
                            <tr>
                                <td class="text-center"><?= ++$no ?></td>
                                <td class="text-center"><?= $product['id_produk'] ?></td>
                                <td><?= $product['nama_produk'] ?></td>
                                <td class="text-center"><a>Rp. <?= number_format($product['harga_produk'], 2, ',', '.') ?></a></td>
                                <td class="text-center"><?= $product['stok_produk'] ?></td>
                                <td class="text-center"><?= array_sum(array_column($product['transaksi'], 'jumlah')) ?></td>
                                <td class="text-center"><a>Rp. <?= number_format(array_sum(array_column($product['transaksi'], 'subharga')), 2, ',', '.') ?></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="right"><strong>Total Keseluruhan : </strong></td>
                            <td class="text-center"><?php echo array_sum(array_column($mergedProducts, 'stok_produk')) ?></td>
                            <td class="text-center"><?php echo $totaljual ?></td>
                            <td class="text-center">Rp. <?= number_format($total_pendapatan, 2, ',', '.') ?></td>
                        </tr>
                    </tfoot>
                    </table>
                </div>
                <br>
                
            </div>
        </div>
        <div class="clearfix">
            <div class="float-left">
                <h1 class="h3 m-0 text-gray-800"><?= $judul1; ?></h1>
            </div>        
        </div>
        <hr>
        <!-- Area Chart -->
        <div class="card mb-4">
            <div class="card-header"><strong>Grafik Data Penjualan</strong></div>
            <div class="card-body">
                <div class="chart-area" style="margin-top: -1rem;">
                    <canvas id="myAreaChart"></canvas>
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
        // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? '.' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? ',' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Bar Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myBarChart = new Chart(ctx, {
        type: 'line', // Mengubah jenis chart menjadi bar
        data: {
            labels: <?php echo json_encode($bulanPendapatan); ?>,
            datasets: [
                {
                    label: "Penjualan    : Rp.",
                    backgroundColor: "rgba(78, 115, 223, 0.5)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    borderWidth: 1,
                    data: <?php echo json_encode($dataPendapatan); ?>,
                },
                {
                    label: "Jumlah Jual :",
                    backgroundColor: "rgba(28, 200, 138, 0.5)",
                    borderColor: "rgba(28, 200, 138, 1)",
                    borderWidth: 0, // Menghilangkan garis
                    pointRadius: 0, // Menghilangkan titik poin
                    data: <?php echo json_encode($stringjual); ?>,
                },
            ],
        },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return 'Rp. ' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ' ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>
        <!-- Modal -->
        <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="printModalLabel">Print Laporan Penjualan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda ingin mencetak Laporan Penjualan?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="printData()">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function printData() {
                // perintah untuk cetak di browser
                window.location.href="<?= base_url('pjual') ?>";
            }
        </script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>