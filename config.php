<?php 
	$server = 'localhost';
	$user = 'root';
	$password = 'Gakusah0';
	$database = 'blog';

	$db = mysqli_connect($server, $user, $password, $database);
 	
 	if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
	} else {
		echo "Success!";
	}
 ?>