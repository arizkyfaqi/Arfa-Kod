<?php

	include_once('../../function/helper.php');
	include_once('../../function/koneksi.php');

	$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
	$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

	$nama = isset($_POST['nama']) ? $_POST['nama'] : false;
	$email = isset($_POST['email']) ? $_POST['email'] : false;
	$level = isset($_POST['level']) ? $_POST['level'] : false;
	$status = isset($_POST['status']) ? $_POST['status'] : false;

	if ($button == "Update") {
		mysqli_query($koneksi, "UPDATE user SET nama='$nama',
												email='$email',
												level='$level',
												status='$status' WHERE user_id='$user_id' ");
	} elseif ($button == "Delete") {
		mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$user_id' ");
	}

	header("location:".BASE_URL."index.php?page=halaman_admin&module=user&action=list");
?>