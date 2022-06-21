
<?php


session_start(); 

if (isset ($_POST['f_submit'])) {
	$user_id = $_SESSION['userid'];
	$tender_id = $_POST['f_tender_id']; 

	require_once ('config.inc.php');
	require_once('functions.inc.php');

	if (watchedExists($conn, $user_id, $tender_id) !== false) {
		header("location: ../tender.php?tender_id=$tender_id&error=alreadywatched");
		exit();
	}

	createWatched($conn, $user_id, $tender_id);
}

else {
	header("location: ../tender.php?tender_id=$tender_id");
	exit();
}