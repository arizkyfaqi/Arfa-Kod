<?php

	include_once('../../function/helper.php');
	include_once('../../function/koneksi.php');

	if ($level != "superadmin") {
		header("location:".BASE_URL);
	}

	$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
	$materi_id = isset($_GET['materi_id']) ? $_GET['materi_id'] : false;

	$kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : false;
	$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : false;
	$status = isset($_POST['status']) ? $_POST['status'] : false;
	$judul = isset($_POST['judul']) ? $_POST['judul'] : false;
	$isi = isset($_POST['isi']) ? $_POST['isi'] : false;
	$tag = isset($_POST['tag']) ? $_POST['tag'] : false;

	$update_gambar = "";
	
	if (!empty($_FILES['gambar']['name'])) {
		$nama_gambar = $_FILES["gambar"]["name"];
		move_uploaded_file($_FILES["gambar"]["tmp_name"], "../../assets/images/".$nama_gambar);
		
		$update_gambar = ", gambar='$nama_gambar'";
	}


	if ($button == "Add") {
		mysqli_query($koneksi, "INSERT INTO materi (judul, kategori_id, isi, gambar, tag, status, tanggal) VALUES ('$judul', '$kategori_id', '$isi', '$nama_gambar', '$tag', '$status', '$tanggal')");
	} elseif ($button == "Update") {
		mysqli_query($koneksi, "UPDATE materi SET judul='$judul',
												  kategori_id='$kategori_id',
												  isi='$isi',
												  tag='$tag',
												  status='$status',
												  tanggal='$tanggal' 
												  $update_gambar WHERE materi_id='$materi_id'");
	} elseif ($button == "Delete") {
		mysqli_query($koneksi, "DELETE FROM materi WHERE materi_id='$materi_id'");
	}

	header("location:".BASE_URL."index.php?page=halaman_admin&module=materi&action=list");
?>