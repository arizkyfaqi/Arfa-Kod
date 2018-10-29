<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background: #F7F7F7;">

	<?php
		
		if ($user_id) {
			$module = isset($_GET['module']) ? $_GET['module'] : false;
			$action = isset($_GET['action']) ? $_GET['action'] : false;
			$level = isset($_GET['level']) ? $_GET['level'] : false;
		} else {
			header("location:".BASE_URL."index.php?page=login");
		}

	?>

	<div class="cotainer">
	<div class="row">

		<div class="col-md-12 bg-page-profile">

			<div class="col-md-3 menu-profile">
				<ul>
					<li>
						<a <?php echo ($module == "kategori") ? "class='active'" : ""; ?> href="<?php echo BASE_URL."index.php?page=halaman_admin&module=kategori&action=list"; ?> ">Kategori</a>
					</li>
					<li>
						<a <?php echo ($module == "materi") ? "class='active'" : ""; ?> href="<?php echo BASE_URL."index.php?page=halaman_admin&module=materi&action=list"; ?> ">Materi</a>
					</li>
					<li>
						<a <?php echo ($module == "user") ? "class='active'" : ""; ?> href="<?php echo BASE_URL."index.php?page=halaman_admin&module=user&action=list"; ?> ">User</a>
					</li>
					<li>
						<a <?php echo ($module == "banner") ? "class='active'" : ""; ?> href="<?php echo BASE_URL."index.php?page=halaman_admin&module=banner&action=list"; ?> ">Banner</a>
					</li>					
				</ul>
			</div>

			<div class="col-md-9 konten-profile">
				<?php

					$file = "module/$module/$action.php";
					if (file_exists($file)) {
						include_once($file);
					} else{
						echo "<h4>Maaf, file tersebut belum ada !</h4>";
					}
				?>
			</div>

		</div>

	</div>
	</div>

</body>
</html>