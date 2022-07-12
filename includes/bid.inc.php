<?php

require ('config.inc.php');
session_start();

$user_id = $_POST['f_user_id'];
$tender_id = $_POST['f_tender_id']; 
$current_price = $_POST['f_current_price'];

$sql = "UPDATE tenders SET current_price = ?, bids = bids + 1 WHERE tender_id = ?"; 
$result = $conn->prepare($sql);
$result -> bind_param ('di', $current_price, $tender_id);
$result -> execute();

$sql_bid = "INSERT INTO bids (tender_id, user_id, bid) VALUES (?,?,?);";
$result_bid = $conn->prepare($sql_bid);
$result_bid -> bind_param ('iid', $tender_id, $user_id, $current_price);
$result_bid -> execute();

header("location: ../tender.php?tender_id=$tender_id");
exit;



