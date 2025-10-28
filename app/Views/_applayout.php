<?php 
    $session = \Config\Services::session(); 
    if(empty($session->get('id_pengguna'))) { ?>

    <script>window.location = '<?= base_url('halmasuk'); ?>'</script>

<?php } else { ?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>THE NEW AVENUE</title>
    
    <!-- Komponen CSS Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Favicon-->
    <link type="image/png" sizes="96x96" rel="icon" href="img/icons8-shop-96.png">

    <!-- Komponen FontAwesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- Komponen Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril Fatface">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <!-- Komponen DataTables (Tabel Data) -->
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- data tables js -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <!-- data tables css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

    <!-- membuat datatables -->
    <script type="text/javascript">
        $(document).ready(function(){ $('#tabel_data').DataTable(); });
    </script>

    <!-- Google Fonts CDN Link -->
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- Font Awesome CDN Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- stylesheet -->
    <link rel="stylesheet" href="css/styley.css" />

</head>
 
<body>
    <div style="padding-top: 50px;">

	<div style="padding: ;">
	    
        <!-- memasukkan form menu-->
        <?php include('_menu.php'); ?>
        <!-- memasukkan form content-->
        <?php include('_content.php'); ?>

	    
	</div>
</body>
    
</html>
<?php } ?>