<?php
	
	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$level = "customer";
	$re_password = $_POST['re_password'];

	unset($_POST['password']);
	unset($_POST['re_password']);
	$dataForm = http_build_query($_POST);
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' ");
	if (empty($nama_lengkap) || empty($email) || empty($password) || empty($re_password)) {
		header("location:".BASE_URL."index.php?page=register&notif=require&$dataForm");
	} elseif ($password != $re_password) {
		header("location:".BASE_URL."index.php?page=register&notif=password&$dataForm");
	} elseif (mysqli_num_rows($query) == 1) {
		header("location:".BASE_URL."index.php?page=register&notif=email&$dataForm");	
	} else {
		mysqli_query($koneksi, "INSERT INTO user (nama, email, password, level) VALUES ('$nama_lengkap', '$email', '$password', '$level' )");
		header("location:".BASE_URL."index.php?page=login");
	}
?>