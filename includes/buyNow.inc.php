<?php 

require ('config.inc.php');
session_start(); 

if (isset($_POST['submit_buy_now'])) {

	$winner_id = $_SESSION['userid'];
	$tender_id = $_POST['tender_id'];
	$buy_now_value = $_POST['buy_now_value'];

	$sql = "SELECT * FROM tenders WHERE tender_id = $tender_id;";
	$results = mysqli_query($conn, $sql); 
	if(mysqli_num_rows($results)>0){
		while($row = mysqli_fetch_array($results)) {
		$owner_id = $row['owner_id'];
		$title = $row['title'];
		$ctgr_id = $row['ctgr_id'];
		$subctgr_id = $row['subctgr_id'];
		$item_condition = $row['item_condition'];
		$description = $row['description'];
		$owner_id = $row['owner_id'];
		$delivery = $row['delivery'];
		$voivodeship_id = $row['voivodeship_id'];
		$city_id = $row['city_id'];
		$bids = $row['bids'];
	}	
	$sql_photo = "SELECT * FROM photos WHERE tender_id = $tender_id LIMIT 1;";
	$results_photo = mysqli_query($conn, $sql_photo); 
	while($row_photo = mysqli_fetch_array($results_photo)) {
		$photo = $row_photo['photo'];
	}

	require_once('functions.inc.php');
	buyNow($conn, $tender_id, $owner_id, $winner_id, $title, $ctgr_id, $subctgr_id, $item_condition, $description, $buy_now_value, $delivery, $voivodeship_id, $city_id, $bids, $photo);
	} else {header("location: ../index.php");
		echo "<script>alert('Ogłoszenie zostało zakończone.')</script>";
				exit(); } 
}
else {
	header("location: ../index.php");
	exit();
}