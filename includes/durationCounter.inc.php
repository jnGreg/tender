<?php 

$add_date = date("Y-m-d H:i:s");
	switch ($duration) {
		case 1:
		$end_date = date("Y-m-d H:i:s", strtotime('+1 days', strtotime($add_date)));
		break;
		case 2:
		$end_date = date("Y-m-d H:i:s", strtotime('+2 days', strtotime($add_date)));
		break;
		case 3:
		$end_date = date("Y-m-d H:i:s", strtotime('+3 days', strtotime($add_date)));
		break;
		case 4:
		$end_date = date("Y-m-d H:i:s", strtotime('+4 days', strtotime($add_date)));
		break;
		case 5:
		$end_date = date("Y-m-d H:i:s", strtotime('+5 days', strtotime($add_date)));
		break;
		case 6:
		$end_date = date("Y-m-d H:i:s", strtotime('+6 days', strtotime($add_date)));
		break;
		case 7:
		$end_date = date("Y-m-d H:i:s", strtotime('+7 days', strtotime($add_date)));
		break;
		case 8:
		$end_date = date("Y-m-d H:i:s", strtotime('+8 days', strtotime($add_date)));
		break;
		case 9:
		$end_date = date("Y-m-d H:i:s", strtotime('+9 days', strtotime($add_date)));
		break;
		case 10:
		$end_date = date("Y-m-d H:i:s", strtotime('+10 days', strtotime($add_date)));
		break;
		case 11:
		$end_date = date("Y-m-d H:i:s", strtotime('+11 days', strtotime($add_date)));
		break;
		case 12:
		$end_date = date("Y-m-d H:i:s", strtotime('+12 days', strtotime($add_date)));
		break;
		case 13:
		$end_date = date("Y-m-d H:i:s", strtotime('+13 days', strtotime($add_date)));
		break;
		case 14:
		$end_date = date("Y-m-d H:i:s", strtotime('+14 days', strtotime($add_date)));
		break;
	}
