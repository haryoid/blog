<?php 
	include('config.php');
	session_start();
	$fname = '';
	$lname = '';
	$email = '';
	$pass = '';
	$errors = array();


	if (isset($_POST['register'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$pass = $_POST['password_1'];
		$pass2 = $_POST['password_2'];

		if (empty($fname)) {
			array_push($errors, "Please enter Your first name");
		}
		if (empty($lname)) {
			array_push($errors, "Please enter Your last name");
		}
		if (empty($email)) {
			array_push($errors, "email can't be blank!");
		}
		if (empty($pass)) {
			array_push($errors, "password can't be blank!");
		}
		if ($pass != $pass2) {
			array_push($errors, "password is different");
		}


		if (count($errors) == 0) {
			$q_check = "SELECT * FROM penulis WHERE email = '$email'";
			$result = mysqli_query($db, $q_check);
			if (mysqli_num_rows($result) != 0) {
				array_push($errors, "Email is already taken");
			} else {
			$password = md5($pass);
			$q_regis = "INSERT INTO penulis(firstname,lastname,email,password) VALUES ('$fname','$lname','$email','$password')";
			mysqli_query($db,$q_regis); 
			$_SESSION['username'] = $email;
			$_SESSION['success'] = "You are loged in!";
			header("location: dashboard.php");
			}
		}

	}

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$pass = $_POST['password'];

		if (empty($email)) {
			array_push($errors, "username can't be blank!");
		}
		if (empty($pass)) {
			array_push($errors, "password can't be blank!");
		}


		if (count($errors) == 0) {
			$password = md5($pass);
			$q_check = "SELECT * FROM penulis WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($db, $q_check);
			$array = mysqli_fetch_array($result);
			
			if (mysqli_num_rows($result) == 1) {
				$_SESSION['username'] = $email;
				$_SESSION['success'] = "You are loged in!";
				header("location: dashboard.php");
			} else {
				array_push($errors, "Email and password isn't match");
			}
		}

	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}
 ?>