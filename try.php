<?php include('userRegis.php'); 
	$password = md5("12345678");
	$q_check = "SELECT * FROM users WHERE username = 'qaz' AND password = '$password'";
	$result = mysqli_query($db, $q_check);
	$array = mysqli_fetch_array($result);
	

	echo $array['password']."<br>";
	echo $password;
?>
