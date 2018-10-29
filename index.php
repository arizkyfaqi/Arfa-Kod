<?php
	
	session_start();

	include_once("function/helper.php");
	include_once("function/koneksi.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Arfa - kod</title>

	<link rel="shortcut icon" type="images/x-icon" href="assets/images/arfa.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0 user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-4.0.0-beta/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap-4.0.0-beta/dist/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="wrap-container">

		<div class="container">

			<nav class="navbar navbar-arfa navbar-expand-sm navbar-light">
					<a href="<?php echo BASE_URL."index.php"; ?>" class="navbar-brand">ARFA-KOD</a>
					<?php echo ($user_id) ? "| Hi $nama," : ""; ?>
					<?php echo ($level == "superadmin") ? "<a href='index.php?page=halaman_admin&module=materi&action=list' id='hal_admin'>&nbsp Halaman admin</a>" : false; ?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuKita">
						<span class="navbar-toggler-icon"></span>
					</button>

				<div class="collapse navbar-collapse" id="menuKita">
					<ul class="navbar-nav nav-li-arfa ml-auto">
						<li><a href="<?php echo BASE_URL."index.php"; ?>" class="nav-link">Home</a></li>
						<li><a href="#" class="nav-link">About</a></li>
						<li><a href="<?php echo BASE_URL."index.php?page=main" ?>" class="nav-link">Product</a></li>
						<?php

							if ($user_id) {
								echo "<li><a href='".BASE_URL."logout.php' class='nav-link'>Logout</a></li>";
							} else {
								echo "<li><a href='".BASE_URL."index.php?page=login' class='nav-link'>Login</a></li>";
							}

						?>
					</ul>
				</div>
			</nav>

			<?php
				$filename = "$page.php";
				if (file_exists($filename)) {
					include_once($filename);
				}  else {
			?>			

			<div class="row">
				
				<div class="col-md-12 home-arfa text-center">
					
					<h1><b>ARFA - KOD</b> Web Developer</h1>
					<h4 class="text-muted">Adalah sebuah website portofolio dan tutorial sederhana seputar pemrograman</h4>

					<div class="row-padding">
						<a href="<?php echo BASE_URL."index.php?page=main" ?>" class="btn tombol-action">Tutorial Koding</a>
						<a href="https://github.com/arizkyfaqi/" class="btn btn-success">GitHub<img src="assets/images/github-logo.png" style="padding-left: 8px; padding-bottom: 3px;"></a>
					</div>

					<div class="showcase d-none d-md-block">
						<img src="assets/images/dev.jpg" id="img-depan" />
					</div>
				</div>

			</div>

			<div class="row d-none d-md-block">
				<div class="col-md-8 offset-md-2 text-center row-padding">
					<h5 class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, laoreet nec augue et, dignissim elementum libero. fermentum.</h5>
					<h6 class="penulis text-muted">Arfa, Web Developer</h6>
				</div>
			</div>

			<div class="row border-line">
				<div class="col-md-12">
					<div class="card card-floating">
						<div class="card-body card-padding d-md-flex align-items-center">
							<div>
								<h5 class="card-title no-margin">Belajar programming dengan metode studi kasus</h5>
								<p class="no-margin text-muted">Mari bergabung di dalam arfakod.com, kita akan belajar sampai kamu bisa.</p>
							</div>

							<div class="ml-auto">
								<a href="#" class="btn tombol-action">Belajar Sekarang</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<section class="row row-padding d-flex align-items-center">
				
				<div class="col-md-5 order-2 order-sm-1">
					<h3 class="clean-code">Clean code</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis quam faucibus, ullamcorper neque sit amet, sollicitudin ex. Aenean viverra elit condimentum rutrum iaculis. Nulla a pharetra lorem. Integer viverra lectus lacus, eu volutpat sapien imperdiet non. Aliquam luctus nisi vitae convallis egestas. Etiam ut ornare lacus. Phasellus et lacus ex.</p>
					<a href="#" class="btn tombol-action">View Tutorial</a>
				</div>

				<div class="col-md-6 offset-md-1 order-1 order-sm-2">
					<img src="assets/images/template.png" />
				</div>

			</section>

			<section class="portofolio" id="portofolio">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h3>Portofolio</h3>
							<hr id="hr-portofolio">
						</div>
					</div>

					<div class="row" style="padding-bottom: 15px;">
					  <div class="col-md-4">
					    <div class="thumbnail-portofolio">
					      <a href="#">
					        <img src="portfolio/arfakod.png" class="img-thumbnail" alt="Lights" style="width:100%">
					        <div class="caption">
					        </div>
					      </a>
					    </div>
					  </div>

					  <div class="col-md-4">
					    <div class="thumbnail-portofolio">
					      <a href="#">
					        <img src="portfolio/portfolio_web.png" class="img-thumbnail" alt="Nature" style="width:100%">
					        <div class="caption">
					        </div>
					      </a>
					    </div>
					  </div>

					  <div class="col-md-4">
					    <div class="thumbnail-portofolio">
					      <a href="#">
					        <img src="portfolio/profile_perusahaan.png" class="img-thumbnail" alt="Fjords" style="width:100%">
					        <div class="caption">
					        </div>
					      </a>
					    </div>
					  </div>


					  <div class="col-md-4">
					    <div class="thumbnail-portofolio">
					      <a href="#">
					        <img src="portfolio/profile_perusahaan.png" class="img-thumbnail" alt="Fjords" style="width:100%">
					        <div class="caption">
					        </div>
					      </a>
					    </div>
					  </div>

					  <div class="col-md-4">
					    <div class="thumbnail-portofolio">
					      <a href="#">
					        <img src="portfolio/arfakod.png" class="img-thumbnail" alt="Fjords" style="width:100%">
					        <div class="caption">
					        </div>
					      </a>
					    </div>
					  </div>

					  <div class="col-md-4">
					    <div class="thumbnail-portofolio">
					      <a href="#">
					        <img src="portfolio/portfolio_web.png" class="img-thumbnail" alt="Fjords" style="width:100%">
					        <div class="caption">
					        </div>
					      </a>
					    </div>
					  </div>

					</div>
				</div>
			</section>


			<section class="row row-padding text-center row-divider">
				
				<div class="col-md-6 offset-md-3 head-section">
					<h3>Technologies We Use</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis quam faucibus, ullamcorper neque sit amet. Nulla a pharetra lorem. Integer viverra lectus lacus.</p>	
				</div>

				<div class="col-md-4 teknologi">
					<img src="assets/images/html5.png" />
					<h5>HTML 5</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis quam faucibus, ullamcorper neque sit amet.</p>
				</div>
				<div class="col-md-4 teknologi">
					<img src="assets/images/css3.png" />
					<h5>CSS 3</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis quam faucibus, ullamcorper neque sit amet.</p>
				</div>
				<div class="col-md-4 teknologi">
					<img src="assets/images/bootstrap.png" />
					<h5>Bootsrap</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis quam faucibus, ullamcorper neque sit amet.</p>
				</div>
			</section>
		
			<?php
				}
			?>

		</div>

		<!-- Footer -->
		<footer>
			<div class="container text-center">
				<div class="row">
					<div class="col-sm-12" ><p> &copy; copyright 2018.</p></div>
				</div>
			</div>
		</footer>
			
	</div>	
</body>
</html>
