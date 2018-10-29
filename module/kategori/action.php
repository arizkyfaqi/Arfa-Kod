<?php

	include_once('../../function/helper.php');
	include_once('../../function/koneksi.php');

	$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];

	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : "";
	$kategori = isset($_POST['kategori']) ? $_POST['kategori'] : "";
	$status = isset($_POST['status']) ? $_POST['status'] : "";

	if ($button == "Add") {
		mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");
	} elseif ($button == "Update") {
		mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori', status='$status' WHERE kategori_id='$kategori_id' ");
	} elseif ($button == "Delete") {
		mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id='$kategori_id' ");
	}

	header("location:".BASE_URL."index.php?page=halaman_admin&module=kategori&action=list");

?>