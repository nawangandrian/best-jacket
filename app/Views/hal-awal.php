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
        body{overflow : hidden;}
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
            margin-left: -9rem;
            margin-top: 3rem;
            font-size: 90px;
            line-height: 100px;
            color: #fff;
        }
        #content p{
            margin: 30px 0;
            margin-top: -0.3rem;
            color: #fff;
            margin-left: -9rem;
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
			<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
				<a class="navbar-brand" href="<?= base_url('halmasuk'); ?>">THE NEW AVENUE</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?= base_url('halmasuk'); ?>">Login <span class="sr-only">(current)</span></a>
						</li>
					</ul>
				</div>
			</nav>

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
    </body>
</html>