<?php 

$hostname	= "localhost"; 
$username	= "root"; 
$password	= ""; 
$database	= "mmm";

$connect	= new mysqli($hostname, $username, $password, $database);

	if($connect->connect_error) { //cek error
		die("Error : ".$connect->connect_error);
	}

function registrasi($data){
	global $connect;

	$username_admin = mysqli_real_escape_string($connect, $data["username_admin"]);
	$password_admin = strtolower(stripslashes($data["password_admin"]));

	mysqli_query($connect, "INSERT INTO admin_gudang VALUES('', '$username_admin', '$password_admin')");

	return mysqli_affected_rows($connect);
}

 ?>