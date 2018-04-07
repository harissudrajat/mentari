  <?php 
  session_start();	
  include "config/koneksi.php";

  ?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kampoeng Jelok Resto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

 
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css selamat datang -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  mengatur menu-->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<script src="includes/jquery/jquery-1.10.2.js"></script>
<script src="includes/jquery/jquery-ui-custom.js"></script>
<script src="includes/jquery/maskedinput.js"></script>
<script src="includes/bootstrap/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="includes/jquery/jquery-ui-custom.css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script>
  jQuery(document).ready(function($) {var dateToday = new Date();
var dates = $("#dateStart, #dateEnd").datepicker({
    defaultDate: "+1w",
	dateFormat: 'yy-mm-dd',
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "dateStart" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker.settings.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
   	 }
	});
});
  </script>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php"> <img src="images/logo.png" > </a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="paket.php">Paket Wisata</a></li>
						<li><a href="reservasi.php">Reservasi</a></li>
						<li><a href="konfirmasi.php">Konfirmasi</a></li>
						<li><a href="informasi.php">Informasi</a></li>
						<li><a href="tentangkami.php">Tentang Kami</a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_bg_3.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container hidden-phone">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">
							<div class="col-md-7 mt-text animate-box " data-animate-effect="fadeInUp">
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Pemesanan Tempat</h2>
					<p>Pengunjung akan dimanjakan dengan berbagai menu khas Kampoeng Jelok Resto.</p>
				</div>
			</div>
			<div class="row">
				<?php
						 $q=mysql_query("Select * from paket where id_kategori='1'");
								while($r=mysql_fetch_array($q))
								{
									$photo="foto_paket/".$r['gambar'];
									$id=$r['id_paket'];
									

								?>
					<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo $photo; ?>" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo $photo; ?>" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?php echo $r['nama_paket']; ?></h2>
							<p><?php echo $r['deskripsi']; ?></p>
							<p> <span class="btn btn-primary">Harga Rp.<?php echo $r['harga']; ?></span></p>
							
						</div>
						
					</a>
				</div>
								<?php
								}
								?>

				

			</div>
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Wisata Bermalam</h2>
					<p>Pengunjung Dapat memilih paket bermalam dengan 2 pilihan yang berbeda dan unik khas Kampoeng Jelok Resto.</p>
				</div>
			</div>
			<div class="row">
				<?php
						 $q=mysql_query("Select * from paket where id_kategori='2'");
								while($r=mysql_fetch_array($q))
								{
									$photo="foto_paket/".$r['gambar'];
									$id=$r['id_paket'];
									

								?>
					<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo $photo; ?>" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo $photo; ?>" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?php echo $r['nama_paket']; ?></h2>
							<p><?php echo $r['deskripsi']; ?></p>
							<p> <span class="btn btn-primary">Harga Rp.<?php echo $r['harga']; ?></span></p>
							
						</div>
					</a>
				</div>
								<?php
								}
								?>

				

			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Wisata Alam</h2>
					<p>Pengunjung bisa menikmati sekitar dengan paket wisata alam yang sudah dikemas menarik.</p>
				</div>
			</div>
			<div class="row">
				<?php
						 $q=mysql_query("Select * from paket where id_kategori='25'");
								while($r=mysql_fetch_array($q))
								{
									$photo="foto_paket/".$r['gambar'];
									$id=$r['id_paket'];
									

								?>
					<div class="col-lg-4 col-md-4 col-sm-6" >
					<div class="fh5co-card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo $photo; ?>" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?php echo $r['nama_paket']; ?></h2>
							<p><?php echo $r['deskripsi']; ?>
							<p> <a href="reservasi.php" class="btn btn-primary">Harga Rp.<?php echo $r['harga']; ?></a></p>
							
						</div>
					</div>
				</div>
								<?php
								}
								?>

				

			</div>
			
		</div>
	</div>
	
	<?php
	   include "foter.php";
	  ?>

	
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
</script>
	</body>
</html>

