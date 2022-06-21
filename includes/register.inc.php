<?php


if (isset($_POST["f_submit"])) {

	$first_name = $_POST["f_first_name"];
	$phone = $_POST["f_phone"];
	$email = $_POST["f_email"];
	$voivodeship = $_POST["voivodeship"];
	$city = $_POST["city"];
	$username = $_POST["f_username"];
	$password = $_POST["f_password"];
	$password_repeat = $_POST["f_password_repeat"];
	$accept_rules = $_POST["f_accept_rules"];
	
	require_once('config.inc.php');
	require_once('functions.inc.php');

	if (emptyInputRegister($first_name, $phone, $email, $voivodeship, $city, $username, $password, $password_repeat) !== false) {
		header("location: ../register.php?error=emptyinput");
		exit();
	}

	if (invalidUsername($username) !== false) {
		header("location: ../register.php?error=invalidusername");
		exit();
	}

	if (invalidEmail($email) !== false) {
		header("location: ../register.php?error=invalidemail");
		exit();
	}

	if (invalidPassword($password) !== false) {
		header("location: ../register.php?error=invalidpassword");
		exit();
	}

	if (invalidFirstName($first_name) !== false) {
		header("location: ../register.php?error=invalidname");
		exit();
	}

	if (invalidPhone($phone) !== false) {
		header("location: ../register.php?error=invalidphone");
		exit();
	}

	if (passwordMatch($password, $password_repeat) !== false) {
		header("location: ../register.php?error=passwordsdontmatch");
		exit();
	}

	if(checkAcceptRules($accept_rules) !== false) {
		header("location: ../register.php?error=rulesnotaccepted");
		exit();
	}


	if (userExistsUsrNm($conn, $username) !== false) {
		header("location: ../register.php?error=usernametaken");
		exit();
	}

	if (userExistsEmail($conn, $email) !== false) {
		header("location: ../register.php?error=emailtaken");
		exit();
	}

	createUser($conn, $first_name, $phone, $email, $voivodeship, $city, $username, $password);
	
}
else {
	header("location: ../register.php");
	exit();
}