<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>THE NEW AVENUE</title>

        <!-- Favicon-->
        <link type="image/png" sizes="96x96" rel="icon" href="img/icons8-shop-96.png">

		<!-- Komponen CSS Bootstrap 4 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

		<!-- Komponen FontAwesome -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

		<!-- Komponen Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril Fatface">

		<!-- Komponen DataTables (Tabel Data) -->
		<!-- Jquery -->
		<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <!-- Include the Chart.js library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.0/Chart.min.js" crossorigin="anonymous"></script>
        
		<!-- data tables js -->
		<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
		<!-- data tables css -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
		<link rel="stylesheet" type="text/css"
			href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
		<!-- Tambahkan referensi Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        
    </head>
    <style>
        body{overflow-x: hidden;}
        @font-face {
            font-family: 'iran_sans_bold';
            src: url('../Fonts/iran_sans_bold.woff') format('woff');
        }

        @font-face {
            font-family: 'iran_sans_light';
            src: url('../Fonts/iran_sans_light.woff') format('woff');
        }

        @font-face {
            font-family: 'iran_sans_medi';
            src: url('../Fonts/iran_sans_medi.woff') format('woff');
        }

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: ;
        }
        #container{
            height: 100vh;
            width: 100%;
        }
        .chart-area {
        position: relative;
        height: 10rem;
        width: 100%;
        }

        @media (min-width: 768px) {
        .chart-area {
            height: 20rem;
        }
        }

        .chart-bar {
        position: relative;
        height: 10rem;
        width: 100%;
        }

        @media (min-width: 768px) {
        .chart-bar {
            height: 20rem;
        }
        }

        .chart-pie {
        position: relative;
        height: 15rem;
        width: 100%;
        }

        @media (min-width: 768px) {
        .chart-pie {
            height: calc(20rem - 43px) !important;
        }
        }

        #background{
            height: 100vh;
            width: 100%;
            background-image: url('img/bg9.jpg');
            
            clip-path: polygon(65% 0,100% 0,100% 100%,30% 100%);
        }
        #navbar{
            height: 70px;
            width: auto;
            position: absolute;
            top: 15px;
        }
        #navbar ul{
            list-style: none;
            display: flex;
            flex-direction: row;
        }
        #navbar ul li{
            height: 60px;
            width: auto;
            font-size: 23px;
            margin: 0px 40px;
            display: flex;
            align-items: center;
        }
        #navbar ul li:first-child{
            margin-left: 120px;
        }
        #navbar ul li a{
            text-decoration: none;
            color: #8c8c8c;
        }
        #navbar ul li a:hover{
            color: #202fff;
            padding: 10px 0;
            border-bottom: 2px solid #202fff;
        }
        #logo{
            color: #fff;
            width: auto;
            position: absolute;
            top: 15px;
            right: 5%;
            font-size: 30px;
            font-weight: bold;
            margin-top: 20px;
        }
        #sideImage{
            height: 500px;
            width: auto;
            margin-top: -45px;
            position: absolute;
            top: calc(50% - 300px);
            left: 5%;
        }
        #sideImage img{
            height: 600px;
            width: auto;
            margin-top: 25px;
        }
        #content{
            height: 650px;
            width: 700px;
            position: absolute;
            right: -15%;
            top: calc(70% - 300px);
        }
        #content h2{
            margin-left: -9.5rem;
            margin-top: 3rem;
            font-size: 90px;
            line-height: 100px;
            color: #fff;
        }
        #content p{
            margin: 30px 0;
            margin-top: -0.3rem;
            color: #fff;
            margin-left: -9.5rem;
            font-size: 20px;
            justify-content:left;
        }
        #content button{
            height: 60px;
            width: 200px;
            margin-left: -8rem;
            outline: none;
            border: none;
            background: #202fff;
            font-size: 25px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
        }
        #socialLink{
            height: 40px;
            width: auto;
            position: absolute;
            bottom: 3%;
            left: 10%;
            display: flex;
            flex-direction: row;
        }
        #socialLink a{
            height: 40px;
            width: 40px;
            margin: 0 5px;
            text-decoration: none;
        }
        #socialLink a i{
            height: 40px;
            width: 40px;
            border: 2px solid #2f4b56;
            font-size: 20px;
            color: #8c8c8c;
            border-radius: 100%;
            display: grid;
            place-items: center;
        }
        #socialLink a i:hover{
            background: #202fff;
            color: #fff;
            border-width: 1px;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        @media only screen and (max-width: 768px) {
            /* Ukuran layar yang lebih kecil dari atau sama dengan 768px */
            #content h2{
                line-height: 65px;
                margin-left: 12rem;
                font-size: 50px;
                top: -180px;
                color: #041e29;
                position: absolute;
            }
            #content p{
                display: hidden;
            }
            #content a{
                height: 60px;
                width: 200px;
                margin-top: 24rem;
                margin-left: 23rem;
                outline: none;
                border: none;
                font-size: 15px;
                cursor: pointer;
            }
            #logo{
                display: none;
            }
            #socialLink {
                height: 40px;
                width: auto;
                position: absolute;
                top: 65%;
                left: 2%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
            }
            #socialLink a i{
                height: 40px;
                width: 40px;
                border: 2px solid #236079;
                font-size: 20px;
                color: #8c8c8c;
                border-radius: 100%;
                display: grid;
                place-items: center;
            }
            #navbar{
                display: none;
            }
            #sideImage img{
                height: 500px;
                width: auto;
                margin-top: 160px;
                margin-left: 2rem;
            }
        }
    </style>
    <body>
            <?php
            $totaljual = 0;
            $totalharga = 0;
            $total_pendapatan = 0;
            $bulanPendapatan = array();
            $dataPendapatan = array();
                        
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
                    } ?>
			<!-- Your page content goes here -->

			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

        <div id="container">
            <div id="background"></div>
            <div id="sideImage">
                <img src="img/3.png" alt="">
            </div>
            
            <div id="content">
                <h2 style="margin-top: 90px; font-family: iran_sans_light;">The New Avenue<br>Jacket Store</h2>
                <p>
                    Jl. Raya PR Sukun, Gondosari, Kec. Gebog, Kudus
                </p>
            </div>
            <div id="socialLink">
                <a href="https://id-id.facebook.com/"><i class="fa fa-facebook"></i></a>
                <a href="https://instagram.com/nawang_andrian"><i class="fa fa-instagram"></i></a>
                <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                <a href="https://wa.me/qr/6B3HWSDGQWZRG1"><i class="fa fa-whatsapp"></i></a>
                <a href="https://t.me/Nawang_127"><i class="fa fa-telegram"></i></a>
            </div>
        </div>

        <section class="conta" id="landing">
            <div class="content__conta">
                <h1>
                Best Jacket<br />
                <span class="heading__1">The New Avenue Store</span><br />
                <span class="heading__2">On Your Life</span>
                </h1>
                <p>
                Tunggu apa lagi? Temukan jaket yang sesuai dengan gaya Anda dan lengkapi penampilan 
                Anda dengan koleksi terbaru dari The New Avenue Jacket Store. 
                </p>
                <form>
                <input type="text" placeholder="Style Sejati Tidak Pernah Menunggu" readonly>
                <button type="submit" href="#">#DiscoverYourStyle</button>
                </form>
            </div>
            <div class="image__conta">
                <img src="img/j4.jpeg" alt="header" />
                <img src="img/j3.jpeg" alt="header" />
                <div class="image__content">
                <ul>
                    <li>Kualitas sesuai dengan harga</li>
                    <li>Jaminan ketahanan jaket</li>
                </ul>
                </div>
            </div>
        </section>
        
        <section id="products" class="bg-light py-5">
          <div class="container">
              <h2 class="text-center mb-4">Daftar Produk</h2>
              <div class="row">
                  <?php foreach ($data_produk as $produk) { ?>
                      <div class="col-md-4 mb-4">
                          <div class="card">
                              <img src="<?= base_url().'/public/foto-produk/'.$produk['foto_produk'] ?>" class="card-img-top mx-auto" alt="Gambar Produk">
                              <div class="card-body">
                                  <h5 class="card-title" style="margin-bottom: 5px;"><?= $produk['jenis_produk'] ?> <?= $produk['nama_produk'] ?> (<?= $produk['ukuran_produk'] ?>)</h5>
                                  <p class="card-text" style="margin-bottom: 5px;">Stok <?= $produk['stok_produk'] ?></p>
                                  <p class="card-text" style="margin-bottom: 5px;">Harga Rp. <?= number_format($produk['harga_produk'], 2, ',', '.') ?></p>
                              </div>
                          </div>
                      </div>
                  <?php } ?>
              </div>
          </div>
      </section>

      <section id="about" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Tentang Kami</h2>
                        <p style="text-align: justify;">The New Avenue Jacket Store adalah toko penjualan online yang menawarkan berbagai pilihan jaket berkualitas dengan desain modern dan trendy. Kami percaya bahwa jaket bukan hanya sekadar pakaian untuk menghangatkan tubuh, tetapi juga merupakan bagian dari gaya dan ekspresi diri seseorang.</p>
                        <p style="text-align: justify;">Pada The New Avenue Jacket Store, kami menawarkan koleksi jaket yang terdiri dari berbagai model dan gaya, mulai dari hoodie, hingga jaket bomber. Setiap jaket kami dipilih dengan cermat untuk memastikan kualitas dan kepuasan pelanggan.</p>
                        <p style="text-align: justify;">Tunggu apa lagi? Temukan jaket yang sesuai dengan gaya Anda dan lengkapi penampilan Anda dengan koleksi terbaru dari The New Avenue Jacket Store. Terima kasih karena telah mempercayai kami sebagai pilihan Anda dalam mendapatkan jaket berkualitas.</p>
                    </div>
                    <div class="col-md-6" style="margin-top: 2rem;">
                        <img src="img/store.jpg"
                            alt="Tentang Kami" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <!-- Area Chart -->
        <section id="grafik" class="bg-light py-5" >
            <div class="container">
                <h2 class="text-center mb-4">Grafik Penjualan</h2>
                <div class="card mb-4" style="margin-bottom: 2rem;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark"><i class="ri-line-chart-fill"></i> Grafik Penjualan Produk</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area" style="margin-top: -1rem;">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>
    <!-- Footer -->
    <div class="pack" style="margin-top: 16rem">
        <footer>
        <div class="conpo" style="margin-top: 10px">
            <div class="wrapper">
            <div class="footer-widget">
                <a href="#">
                <img src="img/logo4.jpg" class="logo"/>
                </a>
                <p class="desc">
                Style Sejati Tidak Pernah Menunggu 
                </p><p style="margin-top: -30px;">#DiscoverYourStyle #TheNewAvenue #BestJacket</p>
                <ul class="socials">
                <li>
                    <a href="https://id-id.facebook.com/">
                    <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="https://instagram.com/nawang_andrian">
                    <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/">
                    <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/qr/6B3HWSDGQWZRG1">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </li>
                <li>
                    <a href="https://t.me/Nawang_127">
                        <i class="fa fa-telegram"></i>
                    </a>
                </li>
                </ul>
            </div>
            <div class="footer-widget">
                <h6>Quick Link</h6>
                <ul class="links" style="margin-top: -20px">
                <li><a href="#container">home</a></li>
                <li><a href="#landing">landing</a></li>
                <li><a href="#products">products</a></li>
                <li><a href="#about">about us</a></li>
                <li><a href="#grafik">grafik</a></li>
                </ul>
            </div>

            <div class="footer-widget">
                <h6>Services</h6>
                <ul class="links" style="margin-top: -20px">
                <li><a href="<?= base_url('halproduk') ?>">Produk</a></li>
                <?php
                    $session = \Config\Services::session();
                    $hak_akses = $session->get('hak_akses');

                    if ($hak_akses == 'Admin') { ?>
                    <li><a href="<?= base_url('haluser') ?>">Pengguna</a></li>
                    <?php } else { ?>
											
                    <?php
                        }
                    ?>
                <li><a href="<?= base_url('tabtransaksi') ?>">Transaksi</a></li>
                <li><a href="<?= base_url('haljual') ?>">Penjualan</a></li>
                </ul>
            </div>
            <div class="footer-widget">
                <h6>Help &amp; Support</h6>
                <ul class="links" style="margin-top: -20px">
                <li><a href="#">support center</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">terms &amp; conditions</a></li>
                </ul>
            </div>
            </div>
            <div class="copyright-wrapper" style="margin-top: -2rem">
                <div class="copyright text-center my-auto">
                    <span>Copyright © <a href="https://instagram.com/nawang_andrian" target="_blank">Nawang Alan Andrian</a></span>
                </div>
            </div>
        </div>
        </footer>
    </div>
    <!-- End of Footer -->
</html>
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