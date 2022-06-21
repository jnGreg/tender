<?php
$serverName = "localhost";
$dBuserName = "root";
$dBpassword = "";
$dBname = "tenders";

$conn = mysqli_connect($serverName, $dBuserName, $dBpassword, $dBname);

	if (!$conn) {
	  die("Connection failed: " . mysql_connect_error());
	}