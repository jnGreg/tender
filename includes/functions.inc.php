<?php 

function emptyInputRegister($first_name, $phone, $email, $voivodeship, $city, $username, $password, $password_repeat) {
	$result;
	if (empty($first_name) || empty($phone) || empty($email) || empty($city) || empty($voivodeship) || empty($username) || empty($password) || empty($password_repeat)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidUsername($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]{5,20}$/", $username)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPassword($password) {
	$result;
	$no = strlen ($password); 
	if ($no <8){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidFirstName($first_name) {
	$result;
	if (!preg_match("/^[a-żA-Ż]{2,15}$/", $first_name)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhone($phone) {
	$result;
	if (!preg_match("/^[0-9]{9}$/", $phone)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function passwordMatch($password, $password_repeat) {
	$result;
	if ($password !== $password_repeat){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function checkAcceptRules($accept_rules) {
	$result;
	if (!isset($accept_rules)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


function userExistsUsrNm($conn, $username) {
	$sql = "SELECT * FROM users WHERE username = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}

	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function userExistsEmail($conn, $email) {
	$sql = "SELECT * FROM users WHERE email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}

	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function createUser($conn, $first_name, $phone, $email, $voivodeship, $city, $username, $password) {
	$sql = "INSERT INTO users (username, password, first_name, email, phone, voivodeship_id, city_id) VALUES (?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailed");
		exit();
	}

	$pwd_hash = password_hash($password, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssssiss", $username, $pwd_hash, $first_name, $email, $phone, $voivodeship, $city);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../login.php?error=none");
	exit();
}

function emptyInputLogin($username, $password) {
	$result;
	if (empty($username) || empty($password)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function userExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../login.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}

	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function loginUser($conn, $username, $password){
	$userExists = userExists($conn, $username, $username); 

	if ($userExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwd_hashed = $userExists["password"];
	$check_psw = password_verify($password, $pwd_hashed); 

	if ($check_psw === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	else if ($check_psw === true) {
		SESSION_START();
		$_SESSION["userid"] = $userExists["user_id"]; 
		$_SESSION["username"] = $userExists["username"]; 
		header("location: ../index.php");
		exit();
	}
}

function emptyInputAdd($title, $category, $subcategory, $start_price, $duration) {
	$result;
	if (empty($title) || empty($category) || empty($subcategory) || empty($start_price) || empty($duration)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


function addTenderZero($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city) {

	$sql = "INSERT INTO tenders (owner_id, title, ctgr_id, subctgr_id, item_condition, description, starting_price, current_price, minimal_price, buy_now_price,
	add_date, end_date, delivery, voivodeship_id, city_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}

	require_once 'durationCounter.inc.php';

	mysqli_stmt_bind_param($stmt, "isiissddddsssii", $owner_id, $title, $category, $subcategory, $item_condition, $description,
		$start_price, $start_price, $min_price, $end_price, $add_date, $end_date, $delivery, $voivodeship, $city);
	mysqli_stmt_execute($stmt);
	$next_tender_id = $conn->insert_id;
	mysqli_stmt_close($stmt);
	
	header("location: ../tender.php?tender_id=$next_tender_id");
	exit();
}

function addTenderOne($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1) {

	$sql = "INSERT INTO tenders (owner_id, title, ctgr_id, subctgr_id, item_condition, description, starting_price, current_price, minimal_price, buy_now_price,
	add_date, end_date, delivery, voivodeship_id, city_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	
	require_once 'durationCounter.inc.php';

	mysqli_stmt_bind_param($stmt, "isiissddddsssii", $owner_id, $title, $category, $subcategory, $item_condition, $description,
		$start_price, $start_price, $min_price, $end_price, $add_date, $end_date, $delivery, $voivodeship, $city);
	mysqli_stmt_execute($stmt);
	$next_tender_id = $conn->insert_id;
	mysqli_stmt_close($stmt);
	
	$sql_photo = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo, $sql_photo)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo, "is", $next_tender_id, $photo1);
	mysqli_stmt_execute($stmt_photo);
	mysqli_stmt_close($stmt_photo);

	header("location: ../tender.php?tender_id=$next_tender_id"); 
	exit();
}

function addTenderTwo($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1, $photo2) {

	$sql = "INSERT INTO tenders (owner_id, title, ctgr_id, subctgr_id, item_condition, description, starting_price, current_price, minimal_price, buy_now_price,
	add_date, end_date, delivery, voivodeship_id, city_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}

	require_once 'durationCounter.inc.php';

	mysqli_stmt_bind_param($stmt, "isiissddddsssii", $owner_id, $title, $category, $subcategory, $item_condition, $description,
		$start_price, $start_price, $min_price, $end_price, $add_date, $end_date, $delivery, $voivodeship, $city);
	mysqli_stmt_execute($stmt);
	$next_tender_id = $conn->insert_id;
	mysqli_stmt_close($stmt);
	

	$sql_photo = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo, $sql_photo)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo, "is", $next_tender_id, $photo1);
	mysqli_stmt_execute($stmt_photo);
	mysqli_stmt_close($stmt_photo);


	$sql_photo2 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo2 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo2, $sql_photo2)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo2, "is", $next_tender_id, $photo2);
	mysqli_stmt_execute($stmt_photo2);
	mysqli_stmt_close($stmt_photo2);

	header("location: ../tender.php?tender_id=$next_tender_id");
	exit();
}

function addTenderThree($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1, $photo2, $photo3) {

	$sql = "INSERT INTO tenders (owner_id, title, ctgr_id, subctgr_id, item_condition, description, starting_price, current_price, minimal_price, buy_now_price,
	add_date, end_date, delivery, voivodeship_id, city_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}

	require_once 'durationCounter.inc.php';

	mysqli_stmt_bind_param($stmt, "isiissddddsssii", $owner_id, $title, $category, $subcategory, $item_condition, $description,
		$start_price, $start_price, $min_price, $end_price, $add_date, $end_date, $delivery, $voivodeship, $city);
	mysqli_stmt_execute($stmt);
	$next_tender_id = $conn->insert_id;
	mysqli_stmt_close($stmt);

	$sql_photo = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo, $sql_photo)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo, "is", $next_tender_id, $photo1);
	mysqli_stmt_execute($stmt_photo);
	mysqli_stmt_close($stmt_photo);


	$sql_photo2 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo2 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo2, $sql_photo2)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo2, "is", $next_tender_id, $photo2);
	mysqli_stmt_execute($stmt_photo2);
	mysqli_stmt_close($stmt_photo2);

	$sql_photo3 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo3 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo3, $sql_photo3)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo3, "is", $next_tender_id, $photo3);
	mysqli_stmt_execute($stmt_photo3);
	mysqli_stmt_close($stmt_photo3);

	header("location: ../tender.php?tender_id=$next_tender_id");
	exit();
}

function addTenderFour($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1, $photo2, $photo3, $photo4) {

	$sql = "INSERT INTO tenders (owner_id, title, ctgr_id, subctgr_id, item_condition, description, starting_price, current_price, minimal_price, buy_now_price,
	add_date, end_date, delivery, voivodeship_id, city_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}

	require_once 'durationCounter.inc.php';

	mysqli_stmt_bind_param($stmt, "isiissddddsssii", $owner_id, $title, $category, $subcategory, $item_condition, $description,
		$start_price, $start_price, $min_price, $end_price, $add_date, $end_date, $delivery, $voivodeship, $city);
	mysqli_stmt_execute($stmt);
	$next_tender_id = $conn->insert_id;
	mysqli_stmt_close($stmt);

	$sql_photo = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo, $sql_photo)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo, "is", $next_tender_id, $photo1);
	mysqli_stmt_execute($stmt_photo);
	mysqli_stmt_close($stmt_photo);


	$sql_photo2 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo2 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo2, $sql_photo2)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo2, "is", $next_tender_id, $photo2);
	mysqli_stmt_execute($stmt_photo2);
	mysqli_stmt_close($stmt_photo2);

	$sql_photo3 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo3 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo3, $sql_photo3)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo3, "is", $next_tender_id, $photo3);
	mysqli_stmt_execute($stmt_photo3);
	mysqli_stmt_close($stmt_photo3);

	$sql_photo4 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo4 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo4, $sql_photo4)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo4, "is", $next_tender_id, $photo4);
	mysqli_stmt_execute($stmt_photo4);
	mysqli_stmt_close($stmt_photo4);

	header("location: ../tender.php?tender_id=$next_tender_id");
	exit();
}


function addTenderFive($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1, $photo2, $photo3, $photo4, $photo5) {

	$sql = "INSERT INTO tenders (owner_id, title, ctgr_id, subctgr_id, item_condition,
	 description, starting_price, current_price, minimal_price, buy_now_price,
	add_date, end_date, delivery, voivodeship_id, city_id)
	 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}

	require_once 'durationCounter.inc.php';

	mysqli_stmt_bind_param($stmt, "isiissddddsssii", $owner_id, $title, $category,
	 $subcategory, $item_condition, $description,
		$start_price, $start_price, $min_price, $end_price, $add_date, $end_date,
		 $delivery, $voivodeship, $city);
	mysqli_stmt_execute($stmt);
	$next_tender_id = $conn->insert_id;
	mysqli_stmt_close($stmt);

	$sql_photo = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo, $sql_photo)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo, "is", $next_tender_id, $photo1);
	mysqli_stmt_execute($stmt_photo);
	mysqli_stmt_close($stmt_photo);


	$sql_photo2 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo2 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo2, $sql_photo2)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo2, "is", $next_tender_id, $photo2);
	mysqli_stmt_execute($stmt_photo2);
	mysqli_stmt_close($stmt_photo2);

	$sql_photo3 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo3 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo3, $sql_photo3)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo3, "is", $next_tender_id, $photo3);
	mysqli_stmt_execute($stmt_photo3);
	mysqli_stmt_close($stmt_photo3);

	$sql_photo4 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo4 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo4, $sql_photo4)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo4, "is", $next_tender_id, $photo4);
	mysqli_stmt_execute($stmt_photo4);
	mysqli_stmt_close($stmt_photo4);

	$sql_photo5 = "INSERT INTO photos (tender_id, photo) VALUES (?,?);"; 
	$stmt_photo5 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt_photo5, $sql_photo5)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}
	

	mysqli_stmt_bind_param($stmt_photo5, "is", $next_tender_id, $photo5);
	mysqli_stmt_execute($stmt_photo5);
	mysqli_stmt_close($stmt_photo5);

	header("location: ../tender.php?tender_id=$next_tender_id");
	exit();
}



function limitExceeded($countfiles) {
$result;
	if ($countfiles > 3){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoSizeOne($size1) {
	$result;
	if ($size1 >= 500000){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoTypeOne($type1, $allowed) {
	$result;
	if (!in_array($type1, $allowed)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoSizeTwo($size2) {
	$result;
	if ($size2 >= 500000){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoTypeTwo($type2, $allowed) {
	$result;
	if (!in_array($type2, $allowed)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoSizeThree($size3) {
	$result;
	if ($size3 >= 500000){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoTypeThree($type3, $allowed) {
	$result;
	if (!in_array($type3, $allowed)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoSizeFour($size4) {
	$result;
	if ($size4 >= 500000){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoTypeFour($type4, $allowed) {
	$result;
	if (!in_array($type4, $allowed)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoSizeFive($size5) {
	$result;
	if ($size5 >= 500000){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidPhotoTypeFive($type5, $allowed) {
	$result;
	if (!in_array($type5, $allowed)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function watchedExists($conn, $user_id, $tender_id) {
	$sql = "SELECT * FROM watched WHERE user_id = ? AND tender_id = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../tender.php?tender_id=$tender_id&error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ii", $user_id, $tender_id);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}

	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function createWatched($conn, $user_id, $tender_id) {
	$sql_watch = "INSERT INTO watched (user_id, tender_id) VALUES (?,?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql_watch)) {
		header("location: ../tender.php?tender_id=$tender_id&error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ii", $user_id, $tender_id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../tender.php?tender_id=$tender_id&error=none");
	exit();
}

function buyNow($conn, $tender_id, $owner_id, $winner_id, $title, $ctgr_id, $subctgr_id, $item_condition, $description, $buy_now_value, $delivery, $voivodeship_id, $city_id, $bids, $photo) {

	$end_date = date("Y-m-d H:i:s"); 
	$end_condition = "Buy Now";

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

	mysqli_stmt_bind_param($stmt, "iiisiissdsssiiis", $tender_id, $owner_id, $winner_id, $title, $ctgr_id, $subctgr_id, $item_condition, $description, $buy_now_value, $end_date, $end_condition, $delivery, $voivodeship_id, $city_id, $bids, $photo);
	mysqli_stmt_execute($stmt);
	$next_archive_id = $conn->insert_id;
	mysqli_stmt_close($stmt);

	header("location: ../archive.php?archive_id=$next_archive_id&error=none");
	exit();
}
/*
function endTime($conn, $tender_ids, $owner_ids, $winner_ids, $titles, $ctgr_ids, $subctgr_ids, $item_conditions, $descriptions, $end_prices, $endTimes, $deliveries, $voivodeship_ids, $city_ids, $bids, $moves) {

	$end_condition = "Time Over";
	$photo = "no_photo.jpg";
	
	for ($x=0; $x < count ($tender_ids); $x++){
		if (next($moves) === true){
			$sql_arch = "INSERT INTO archive (tender_id, owner_id, winner_id, title, ctgr_id, subctgr_id, item_condition, description, end_price, end_date, end_condition, delivery, voivodeship_id, city_id, bids, photo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql_arch)) {
				header("location: ../tender.php?tender_id=$tender_id&error=stmtfailed");
				exit();
			}
			$next_deleted_tender = next($tender_ids);
			$sql_tender = "DELETE FROM tenders WHERE tender_id = $next_deleted_tender;";
			mysqli_query($conn, $sql_tender);

			$sql_watched = "DELETE FROM watched WHERE tender_id = $next_deleted_tender;";
			mysqli_query($conn, $sql_watched);

			$next_deleted_owner_ids = next($owner_ids);
			$next_deleted_winner_ids = next($winner_ids);   
			$next_deleted_titles = next($titles);
			$next_deleted_ctgr_ids = next($ctgr_ids);
			$next_deleted_subctgr_ids = next($subctgr_ids);
			$next_deleted_item_conditions = next($item_conditions);
			$next_deleted_descriptions = next($descriptions);
			$next_deleted_end_prices = next($end_prices);
			$next_deleted_end_dates = next($endTimes);	
			$next_deleted_deliveries = next($deliveries);
			$next_deleted_voivodeship_ids = next($voivodeship_ids);
			$next_deleted_city_ids = next($city_ids);	
			$next_deleted_bids = next($bids);		


			mysqli_stmt_bind_param($stmt, "iiisiissdsssiiis", $next_deleted_tender, $next_deleted_owner_ids, $next_deleted_winner_ids, $next_deleted_titles, $next_deleted_ctgr_ids, $next_deleted_subctgr_ids, $next_deleted_item_conditions, $next_deleted_descriptions, $next_deleted_end_prices, $next_deleted_end_dates, $end_condition, $next_deleted_deliveries, $next_deleted_voivodeship_ids, $next_deleted_city_ids, $next_deleted_bids, $photo);
			mysqli_stmt_execute($stmt);
			$next_archive_id = $conn->insert_id;
			mysqli_stmt_close($stmt);
		}
	}
	
	exit();
}

*/