<?php 
require ('includes/config.inc.php');

$query = $conn->prepare("SELECT * FROM users;");
$query->execute();
$query->store_result();
$num_users = $query->num_rows;

if ($num_users < 88 ){
	require_once('populate.php');
	populateUsers($conn);
}
else {
	set_time_limit(598);
	$i = 0;
	while ($i < 112) { 
		sleep (5);
		require('includes/endTime.inc.php');
		if ($i%2 == 0){
			require_once('populate.php');
			populateTenders($conn);
			}
		$i++;
	}
}