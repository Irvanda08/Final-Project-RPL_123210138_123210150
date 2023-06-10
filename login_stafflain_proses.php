<?php
	session_start();
	include 'koneksi_admin.php';

	$username_stafflain = $_POST['username_stafflain'];
	$password_stafflain = $_POST['password_stafflain'];

	$sql = "SELECT * FROM staff_lain where username_stafflain='$username_stafflain' and password_stafflain ='$password_stafflain'";
	$data = mysqli_query($connect,$sql);

	$cek = mysqli_num_rows($data);

	if($cek>0){
		$_SESSION['username_stafflain']=$username_stafflain;
		$_SESSION['status']="login";
		header("location:home_stafflain.php");
	}else{
		header("location:login_stafflain.php?message=failed");
	}
 ?>