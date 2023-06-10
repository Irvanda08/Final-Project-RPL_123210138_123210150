<?php
	session_start();
	include 'koneksi_admin.php';

	$username_admin = $_POST['username_admin'];
	$password_admin = $_POST['password_admin'];

	$sql = "SELECT * FROM admin_gudang where username_admin='$username_admin' and password_admin ='$password_admin'";
	$data = mysqli_query($connect,$sql);

	$cek = mysqli_num_rows($data);

	if($cek>0){
		$_SESSION['username_admin']=$username_admin;
		$_SESSION['status']="login";
		header("location:home_admin.php");
	}else{
		header("location:index.php?message=failed");
	}
 ?>