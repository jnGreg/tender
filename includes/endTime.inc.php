<?php 

require ('config.inc.php');
$currentTime = date("Y-m-d H:i:s");
$sql = "SELECT * FROM tenders;";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
	$end_date = date("Y-m-d H:i:s", strtotime($row['end_date'])); 
	if ($end_date < $currentTime) { 
		$tender_id = $row['tender_id'];
		$owner_id = $row['owner_id'];
		$bids = $row['bids'];
		if ($bids > 0){
			$current_price = $row['current_price'];
			$minimal_price = $row['minimal_price'];
			if ($current_price > $minimal_price){
				$query_max = "SELECT MAX(bid) AS top_bid FROM bids WHERE tender_id = '$tender_id';";
				$results_max = mysqli_query($conn, $query_max); 
				while($row_m = mysqli_fetch_array($results_max)) {
					$end_price = $row_m['top_bid'];}
				$query_bidder = "SELECT user_id FROM bids WHERE tender_id = '$tender_id' AND bid = '$end_price';";
				$results_bidder = mysqli_query($conn, $query_bidder); 
				while($row_u = mysqli_fetch_array($results_bidder)) {
					$winner_id = $row_u['user_id']; }
			}
			else { $winner_id = NULL;
					$end_price = NULL;}
		}
		else { $winner_id = NULL;
					$end_price = NULL;}
		
		$title = $row['title'];
		$ctgr_id = $row['ctgr_id'];
		$subctgr_id = $row['subctgr_id'];
		$item_condition = $row['item_condition'];
		$description = $row['description'];
		$delivery = $row['delivery'];
		$voivodeship_id = $row['voivodeship_id'];
		$city_id = $row['city_id'];
		$sql_photo = "SELECT * FROM photos WHERE tender_id = $tender_id LIMIT 1;";
		$results_photo = mysqli_query($conn, $sql_photo); 
		while($row_photo = mysqli_fetch_array($results_photo)) {
		$photo = $row_photo['photo'];}
		$end_condition = "Time Over";

		$sql_arch = "INSERT INTO archive (tender_id, owner_id, winner_id, title, ctgr_id, subctgr_id, item_condition, description, end_price, end_date, end_condition, delivery, voivodeship_id, city_id, bids, photo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql_arch)) {
			header("location: ../tender.php?tender_id=$tender_id&error=stmtfailed");
			exit();
		}

		$sql_tender = "DELETE FROM tenders WHERE tender_id = $tender_id;";
		mysqli_query($conn, $sql_tender);

		$sql_watched = "DELETE FROM watched WHERE tender_id = $tender_id;";
		mysqli_query($conn, $sql_watched);

		mysqli_stmt_bind_param($stmt, "iiisiissdsssiiis", $tender_id, $owner_id, $winner_id, $title, $ctgr_id, $subctgr_id, $item_condition, $description, $end_price, $end_date, $end_condition, $delivery, $voivodeship_id, $city_id, $bids, $photo);
		mysqli_stmt_execute($stmt);
		$next_archive_id = $conn->insert_id;
		mysqli_stmt_close($stmt);



		}
}

