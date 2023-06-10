<?php
	session_start();
	include 'koneksi_admin.php';

	$username_staff = $_POST['username_staff'];
	$password_staff = $_POST['password_staff'];

	$sql = "SELECT * FROM staff_gudang where username_staff='$username_staff' and password_staff ='$password_staff'";
	$data = mysqli_query($connect,$sql);

	$cek = mysqli_num_rows($data);

	if($cek>0){
		$_SESSION['username_staff']=$username_staff;
		$_SESSION['status']="login";
		header("location:home_staffgudang.php");
	}else{
		header("location:login_staffgudang.php?message=failed");
	}
 ?>