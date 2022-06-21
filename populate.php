<?php 

require ('includes/config.inc.php');

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomPhone() {
    $digits = '0123456789';
    $digitsLength = strlen($digits);
    $randomNumber = '';
    for ($i = 0; $i < 9; $i++) {
        $randomNumber .= $digits[rand(0, $digitsLength - 1)];
    }
    return $randomNumber;
}

function populateUsers($conn) {
	$sql = "INSERT INTO users (username, password, first_name, email, phone, voivodeship_id, city_id) VALUES (?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailed");
		exit();
	}

	$username = generateRandomString(rand(5, 20));
	$pwd = generateRandomString(rand(8, 25));

	$pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

	$polish_names = array('Julia','Zuzanna','Zofia','Hanna','Maja','Lena','Alicja','Oliwia','Maria','Laura',
		'Antoni','Jan','Jakub','Aleksander','Franciszek','Szymon','Filip','Mikołaj','Stanisław','Wojciech','Adam',
		'Mieszko','Tadeusz','Ignacy','Szczepan','Fryderyk','Władysław','Przemysław','Radosław','Kazimierz',
		'Jadwiga','Apolonia','Alina','Jagoda','Teresa','Helena','Gabriela','Róża','Wanda','Mirosław','Joanna','Nadia','Marta','Martyna');
	$random_name = rand(0, 43);
	$first_name = $polish_names[$random_name];

	$email_salt = generateRandomString(5);
	$email = $first_name . $email_salt . "@tender.eu";

	$phone = generateRandomPhone();

	$voivodeship = rand(1, 16);
	$voivodeship *= 2;

	if ($voivodeship === 2){
		$city = rand(1, 91);
	}
	else if ($voivodeship === 4){
		$city = rand(92, 143);
	}
	else if ($voivodeship === 6){
		$city = rand(144, 189);
	}

	else if ($voivodeship === 8){
		$city = rand(190, 231);
	}

	else if ($voivodeship === 10){
		$city = rand(232, 275);
	}

	else if ($voivodeship === 12){
		$city = rand(276, 336);
	}

	else if ($voivodeship === 14){
		$city = rand(337, 421);
	}

	else if ($voivodeship === 16){
		$city = rand(422, 456);
	}

	else if ($voivodeship === 18){
		$city = rand(457, 507);
	}

	else if ($voivodeship === 20){
		$city = rand(508, 547);
	}

	else if ($voivodeship === 22){
		$city = rand(548, 589);
	}

	else if ($voivodeship === 24){
		$city = rand(590, 660);
	}

	else if ($voivodeship === 26){
		$city = rand(661, 692);
	}

	else if ($voivodeship === 28){
		$city = rand(693, 741);
	}

	else if ($voivodeship === 30){
		$city = rand(742, 853);
	}

	else {
		$city = rand(854, 918);
	}


	mysqli_stmt_bind_param($stmt, "ssssiss", $username, $pwd_hash, $first_name, $email, $phone, $voivodeship, $city);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	exit();
}

function populateTenders($conn) {

	$owner_id = rand(1, 88);

	$category = rand(1,3); //12
	if ($category === 1){
		$subcategory = rand(1, 5);
	}
	else if ($category === 2){
		$subcategory = rand(6, 12);
	}
	else if ($category === 3){
		$subcategory = rand(13, 16); //17
	}
	else if ($category === 4){
		$subcategory = rand(18, 22);
	}
	else if ($category === 5){
		$subcategory = rand(23, 27);
	}
	else if ($category === 6){
		$subcategory = rand(28, 33);
	}
	else if ($category === 7){
		$subcategory = rand(34, 40);
	}
	else if ($category === 8){
		$subcategory = rand(41, 46);
	}
	else if ($category === 9){
		$subcategory = rand(47, 54);
	}
	else if ($category === 10){
		$subcategory = rand(55, 59);
	}
	else if ($category === 11){
		$subcategory = rand(60, 62);
	}
	else {
		$subcategory = rand(63, 66);
	}

	if ($subcategory === 1){
		$subsubs = array('Żarówka samochodowa','Silnik'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Żarówka samochodowa'){ // this name

			$title_sufixes1 = array('mocna','tanio','LED'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('pomarańczowa', 'czerwona', 'żółta'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('polecam', 'musisz zobaczyć', 'bez porównania'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 exclusively

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(200, 3000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Poczta polska 8zł, kurier 12zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'car_bulb1.jpg'; // set name here
				$photo2 = 'car_bulb2.jpg';
				$photo3 = 'car_bulb3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'car_bulb2.jpg';
				$photo2 = 'car_bulb1.jpg'; // set name here
				$photo3 = 'car_bulb3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'car_bulb3.jpg'; // set name here
				$photo2 = 'car_bulb2.jpg';
				$photo3 = 'car_bulb1.jpg';
			}

		}
		else if ($subsub === 'Silnik'){
			$title_sufixes1 = array('VW','Mercedes','BMW','Mazda','Opel'); // sufixes here
			$random_title_sufix1 = rand(0, 4); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('125 KM','150 KM', '200 KM', '180 KM'); // sufixes here
			$random_title_sufix2 = rand(0, 3); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('mocny', 'nie przegap', 'polecam'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(200000, 1500000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Tylko kurierem ok 100zł lub dowóz w granich 30km."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'car_engine1.jpg'; // set name here
				$photo2 = 'car_engine2.jpg';
				$photo3 = 'car_engine3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'car_engine2.jpg';
				$photo2 = 'car_engine1.jpg'; // set name here
				$photo3 = 'car_engine3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'car_engine3.jpg'; // set name here
				$photo3 = 'car_engine2.jpg';
				$photo2 = 'car_engine1.jpg';
			}
		}
	}
	else if ($subcategory === 2) {
		$subsubs = array('Fotelik samochodowy','Wycieraczki'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Fotelik samochodowy'){ // this name

			$title_sufixes1 = array('ładny','tani','spełnia standardy'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('w kratkę', 'modny', 'wygodny'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('polecam', 'musisz zobaczyć', 'najlepszy'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(4000, 15000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczkomat 12zł, kurier 15zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'car_seat1.jpg'; // set name here
				$photo2 = 'car_seat2.jpg';
				$photo3 = 'car_seat3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'car_seat2.jpg';
				$photo2 = 'car_seat1.jpg'; // set name here
				$photo3 = 'car_seat3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'car_seat3.jpg'; // set name here
				$photo3 = 'car_seat2.jpg';
				$photo2 = 'car_seat1.jpg';
			}

		}
		else if ($subsub === 'Wycieraczki'){
			$title_sufixes1 = array('długie','czarne','oryginalne'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('pasują','pasują', 'pasują'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('do golfa', 'do toyoty', 'do każdego'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(2000, 5000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Poczta Polska 8zł, Paczkomaty 10 zł."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'no_photo.jpg'; // set name here
				$photo2 = 'no_photo.jpg';
				$photo3 = 'no_photo.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'no_photo.jpg';
				$photo2 = 'no_photo.jpg'; // set name here
				$photo3 = 'no_photo.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'no_photo.jpg'; // set name here
				$photo2 = 'no_photo.jpg';
				$photo3 = 'no_photo.jpg';
			}
		}
	}
	else if ($subcategory === 3) {
		$subsubs = array('Rękawiczki motocyklowe','Kurtka motocyklowa'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Rękawiczki motocyklowe'){ // this name

			$title_sufixes1 = array('mocne','bezpieczne','wygodne'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('czarne', 'czerwone', 'męskie'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('polecam', 'musisz zobaczyć', 'markowe'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(7000, 15000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Przesyłka polecona 9 zł, Paczkomat 12zł, kurier 15zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'motorcycle_gloves4.jpg'; // set name here
				$photo2 = 'motorcycle_gloves3.jpg';
				$photo3 = 'motorcycle_gloves2.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'motorcycle_gloves1.jpg';
				$photo2 = 'motorcycle_gloves4.jpg'; // set name here
				$photo3 = 'motorcycle_gloves2.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'motorcycle_gloves3.jpg'; // set name here
				$photo2 = 'motorcycle_gloves1.jpg';
				$photo3 = 'motorcycle_gloves2.jpg';
			}

		}
		else if ($subsub=== 'Kurtka motocyklowa'){
			$title_sufixes1 = array('męska','bezpieczna','czarna'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('wygodna', 'skórzana', 'skóra'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('polecam', 'musisz zobaczyć', 'nie przegap'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(12000, 30000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Przesyłka polecona 9 zł, Paczkomat 12zł, kurier 15zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'motorcycle_jacket1.jpg'; // set name here
				$photo2 = 'motorcycle_jacket3.jpg';
				$photo3 = 'motorcycle_jacket2.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'motorcycle_jacket2.jpg';
				$photo2 = 'motorcycle_jacket3.jpg'; // set name here
				$photo3 = 'motorcycle_jacket1.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'motorcycle_jacket3.jpg'; // set name here
				$photo2 = 'motorcycle_jacket1.jpg';
				$photo3 = 'motorcycle_jacket2.jpg';
			}
		}
		
	}
	else if ($subcategory === 4) {
		$subsubs = array('Opony','Felgi'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Opony'){ // this name

			$title_sufixes1 = array('całoroczne','zimowe','letnie'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('14', '12', '16'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('komplet', 'Goodyear', 'Yokohama'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(15000, 32000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "kurier 25zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'car_tires1.jpg'; // set name here
				$photo2 = 'car_tires2.jpg';
				$photo3 = 'car_tires3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'car_tires2.jpg';
				$photo2 = 'car_tires1.jpg'; // set name here
				$photo3 = 'car_tires3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'car_tires3.jpg'; // set name here
				$photo2 = 'car_tires2.jpg';
				$photo3 = 'car_tires1.jpg';
			}

		}
		else if ($subsub=== 'Felgi'){
			$title_sufixes1 = array('do opon','komplet','do opon'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('12', '14', '16'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('polecam', 'musisz zobaczyć', 'nie przegap'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(30000, 90000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczka pocztowa polecona 13 zł, Paczkomat 15zł, kurier 20zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'car_rims1.jpg'; // set name here
				$photo2 = 'car_rims3.jpg';
				$photo3 = 'car_rims2.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'car_rims2.jpg';
				$photo2 = 'car_rims3.jpg'; // set name here
				$photo3 = 'car_rims1.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'car_rims3.jpg'; // set name here
				$photo2 = 'car_rims1.jpg';
				$photo3 = 'car_rims2.jpg';
			}
		}
	}
	else if ($subcategory === 5) {
		$subsubs = array('Płyn do spryskiwaczy','Olej silnikowy'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Płyn do spryskiwaczy'){ // this name

			$title_sufixes1 = array('900 ml','1,4l','2 litry'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('z Niemiec', 'starcza na długo', '16'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('zielony', 'niebieski', 'polecam'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[1]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(2500, 5000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 0) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 10) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczka pocztowa polecona 13 zł, Paczkomat 15zł, kurier 20zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'no_photo.jpg'; // set name here
				$photo2 = 'no_photo.jpg';
				$photo3 = 'no_photo.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'no_photo.jpg';
				$photo2 = 'no_photo.jpg'; // set name here
				$photo3 = 'no_photo.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'no_photo.jpg'; // set name here
				$photo2 = 'no_photo.jpg';
				$photo3 = 'no_photo.jpg';
			}

		}
		else if ($subsub=== 'Olej silnikowy'){
			$title_sufixes1 = array('1,6l ml','1,4l','2 litry'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('z Niemiec', 'starcza na długo', '16'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('Statoil', 'Statoil', 'polecam'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[1]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(2500, 5000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 0) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 10) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczka pocztowa polecona 13 zł, Paczkomat 15zł, kurier 20zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'no_photo.jpg'; // set name here
				$photo2 = 'no_photo.jpg';
				$photo3 = 'no_photo.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'no_photo.jpg';
				$photo2 = 'no_photo.jpg'; // set name here
				$photo3 = 'no_photo.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'no_photo.jpg'; // set name here
				$photo2 = 'no_photo.jpg';
				$photo3 = 'no_photo.jpg';
			}
		}
	}
	else if ($subcategory === 6) {
		$subsubs = array('Smartphone','Słuchawki'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Smartphone'){ // this name

			$title_sufixes1 = array('Nokia','Oppo','Samsung'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('4 GB RAM', '2 GB RAM', '6 GB RAM'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('5,2 cala', '6 calowy!', 'prawie 7 cali'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(35000, 110000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "przesyłka polecona 9 zł, Paczkomat 12zł, kurier 15zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'smartphone1.jpg'; // set name here
				$photo2 = 'smartphone2.jpg';
				$photo3 = 'smartphone3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'smartphone2.jpg';
				$photo2 = 'smartphone4.jpg'; // set name here
				$photo3 = 'smartphone3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'smartphone4.jpg'; // set name here
				$photo2 = 'smartphone2.jpg';
				$photo3 = 'smartphone1.jpg';
			}

		}
		else if ($subsub=== 'Słuchawki'){
			$title_sufixes1 = array('Mini jack','Audo Jack','USB'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('przewodowe', 'na kablu', 'markowe'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('POLECAM', 'D.R.E.', 'tanio'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(2500, 12000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "przesyłka polecona 9 zł, Paczkomat 12zł, kurier 15zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'headphones1.jpg'; // set name here
				$photo2 = 'headphones3.jpg';
				$photo3 = 'headphones2.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'headphones2.jpg';
				$photo2 = 'headphones3.jpg'; // set name here
				$photo3 = 'headphones1.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'headphones3.jpg'; // set name here
				$photo2 = 'headphones1.jpg';
				$photo3 = 'headphones2.jpg';
			}
		}
	}
	else if ($subcategory === 7) {
		$subsubs = array('Pralka','Lodówka'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Pralka'){ // this name

			$title_sufixes1 = array('LG','Finlux','Samsung'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('biała', 'kWh 67', 'obr/min: 1400'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('polecam', 'A+', 'F'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(100000, 400000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Kurier 50zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'washing1.jpg'; // set name here
				$photo2 = 'washing2.jpg';
				$photo3 = 'washing3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'washing2.jpg';
				$photo2 = 'washing3.jpg'; // set name here
				$photo3 = 'washing3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'washing3.jpg'; // set name here
				$photo2 = 'washing2.jpg';
				$photo3 = 'washing1.jpg';
			}

		}
		else if ($subsub=== 'Lodówka'){
			$title_sufixes1 = array('Whirlpool','Becco','Samsung'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('małe zużycie', 'F', 'A++'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('pojemna', '417l / 218l', 'kWh/rok: 432'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(200000, 600000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Kurier 60zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'fridge1.jpg'; // set name here
				$photo2 = 'fridge3.jpg';
				$photo3 = 'fridge2.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'fridge2.jpg';
				$photo2 = 'fridge3.jpg'; // set name here
				$photo3 = 'fridge1.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'fridge3.jpg'; // set name here
				$photo2 = 'fridge1.jpg';
				$photo3 = 'fridge2.jpg';
			}
		}
	}
	else if ($subcategory === 8) {
		$subsubs = array('Telewizor','TV'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Telewizor'){ // this name

			$title_sufixes1 = array('LG','Sony','Samsung'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('lcd', 'led', 'falcon'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('52 cale', '43 cale', '48 cali'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(200000, 500000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Kurier 50zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'tv1.jpg'; // set name here
				$photo2 = 'tv2.jpg';
				$photo3 = 'tv3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'tv2.jpg';
				$photo2 = 'tv3.jpg'; // set name here
				$photo3 = 'tv3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'tv3.jpg'; // set name here
				$photo2 = 'tv2.jpg';
				$photo3 = 'tv1.jpg';
			}

		}
		else if ($subsub=== 'TV'){
			$title_sufixes1 = array('LG','Sony','Samsung'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('lcd', 'led', 'falcon'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('52 cale', '43 cale', '48 cali'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(200000, 500000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Kurier 50zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'tv1.jpg'; // set name here
				$photo2 = 'tv2.jpg';
				$photo3 = 'tv3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'tv2.jpg';
				$photo2 = 'tv3.jpg'; // set name here
				$photo3 = 'tv3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'tv3.jpg'; // set name here
				$photo2 = 'tv2.jpg';
				$photo3 = 'tv1.jpg';
			}
	}
}
	else if ($subcategory === 9) {
		$subsubs = array('Komputer','PC'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Komputer'){ // this name

			$title_sufixes1 = array('Zelman','Intel','IBM'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('i7', 'i5', 'i9'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('8 GB RAM', '12 GB RAM', '4 GB'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(300000, 600000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Kurier 50zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'pc1.jpg'; // set name here
				$photo2 = 'pc2.jpg';
				$photo3 = 'pc3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'pc2.jpg';
				$photo2 = 'pc3.jpg'; // set name here
				$photo3 = 'pc3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'pc3.jpg'; // set name here
				$photo2 = 'pc2.jpg';
				$photo3 = 'pc1.jpg';
			}

		}
		else if ($subsub=== 'PC'){
			$title_sufixes1 = array('Zelmann','Intel','Lenovo'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('i7', 'i5', 'i9'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('8 GB RAM', '12 GB RAM', '4 GB'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(300000, 600000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Kurier 50zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'pc1.jpg'; // set name here
				$photo2 = 'pc2.jpg';
				$photo3 = 'pc3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'pc2.jpg';
				$photo2 = 'pc3.jpg'; // set name here
				$photo3 = 'pc3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'pc3.jpg'; // set name here
				$photo2 = 'pc2.jpg';
				$photo3 = 'pc1.jpg';
			}
	}
}
	else if ($subcategory === 10) {
		$subsubs = array('XBOX One','PS4'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'XBOX One'){ // this name

			$title_sufixes1 = array('Dwa pady','Pady','Pad'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('Gratis Gry', 'HDD', 'Kinect'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('1 tB', '512 GB', 'SSD'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(50000, 180000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczkomat 20 zł, kurier 35zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'xbox1.jpg'; // set name here
				$photo2 = 'xbox2.jpg';
				$photo3 = 'xbox3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'xbox2.jpg';
				$photo2 = 'xbox3.jpg'; // set name here
				$photo3 = 'xbox3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'xbox3.jpg'; // set name here
				$photo2 = 'xbox2.jpg';
				$photo3 = 'xbox1.jpg';
			}

		}
		else if ($subsub=== 'PS4'){
			$title_sufixes1 = array('Dwa pady','Pady','Pad'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('Gratis Gry', 'Gratis GTA5', 'GTA, Rainbow Six:Siege'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('PRO', 'SLIM', 'SSD'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(40000, 130000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczkomat 20 zł, kurier 35zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'ps1.jpg'; // set name here
				$photo2 = 'ps2.jpg';
				$photo3 = 'ps3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'ps2.jpg';
				$photo2 = 'ps3.jpg'; // set name here
				$photo3 = 'ps1.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'ps3.jpg'; // set name here
				$photo2 = 'ps1.jpg';
				$photo3 = 'ps2.jpg';
			}
	}
}
	else if ($subcategory === 11) {
		$subsubs = array('Wieża audio','Wieże'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Wieża audio'){ // this name

			$title_sufixes1 = array('Panasonic','Qba','Philips'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('CD', 'kolumny', 'kolumny'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('polecam', 'warto', 'audiofilskie'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(50000, 180000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Tylko kurier 45zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'audio1.jpg'; // set name here
				$photo2 = 'audio2.jpg';
				$photo3 = 'audio3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'audio2.jpg';
				$photo2 = 'audio1.jpg'; // set name here
				$photo3 = 'audio3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'audio3.jpg'; // set name here
				$photo2 = 'audio1.jpg';
				$photo3 = 'audio2.jpg';
			}

		}
		else if ($subsub=== 'Wieże'){
			$title_sufixes1 = array('Panasonic','Qba','Philips'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('CD', 'kolumny', 'kolumny'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('polecam', 'warto', 'audiofilskie'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(50000, 180000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Tylko kurier 45zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'audio1.jpg'; // set name here
				$photo2 = 'audio2.jpg';
				$photo3 = 'audio3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'audio2.jpg';
				$photo2 = 'audio1.jpg'; // set name here
				$photo3 = 'audio3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'audio3.jpg'; // set name here
				$photo2 = 'audio1.jpg';
				$photo3 = 'audio2.jpg';
			}
	}
}
	else if ($subcategory === 12) {
		$subsubs = array('Aparat','Aparat fotograficzny'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Aparat fotograficzny'){ // this name

			$title_sufixes1 = array('Nikon','Sony','Leica'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('polecam', 'renomowany', 'profesjonalny'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('warto', 'obiektyw', 'kadr'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(50000, 180000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczka pocztowa polecona 13 zł, Paczkomat 15zł, kurier 20zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'camera1.jpg'; // set name here
				$photo2 = 'camera2.jpg';
				$photo3 = 'camera3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'camera2.jpg';
				$photo2 = 'camera1.jpg'; // set name here
				$photo3 = 'camera3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'camera3.jpg'; // set name here
				$photo2 = 'camera1.jpg';
				$photo3 = 'camera2.jpg';
			}

		}
		else if ($subsub=== 'Aparat'){
			$title_sufixes1 = array('fotograficzny','fotograficzny','fotograficzny'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('polecam', 'renomowany', 'profesjonalny'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('warto', 'obiektyw', 'kadr'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(50000, 180000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczka pocztowa polecona 13 zł, Paczkomat 15zł, kurier 20zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'camera1.jpg'; // set name here
				$photo2 = 'camera2.jpg';
				$photo3 = 'camera3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'camera2.jpg';
				$photo2 = 'camera1.jpg'; // set name here
				$photo3 = 'camera3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'camera3.jpg'; // set name here
				$photo2 = 'camera1.jpg';
				$photo3 = 'camera2.jpg';
			}
	}
}
	else if ($subcategory === 13) {
		$subsubs = array('Szafa','Stół'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Szafa'){ // this name

			$title_sufixes1 = array('mahoń','olcha','heban'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('duża', 'pojemna', 'ładna'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('warto', 'na lata', 'polecam'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(200000, 500000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Tylko odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'wardrobe1.jpg'; // set name here
				$photo2 = 'wardrobe2.jpg';
				$photo3 = 'wardrobe3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'wardrobe2.jpg';
				$photo2 = 'wardrobe1.jpg'; // set name here
				$photo3 = 'wardrobe3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'wardrobe3.jpg'; // set name here
				$photo2 = 'wardrobe1.jpg';
				$photo3 = 'wardrobe2.jpg';
			}

		}
		else if ($subsub=== 'Stół'){
			$title_sufixes1 = array('mahoń','olcha','heban'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('polecam', 'duży', 'piękny'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('dobrze wykonany', 'dobrze wykończony', 'polska firma'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(350000, 650000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Tylko odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'table1.jpg'; // set name here
				$photo2 = 'table2.jpg';
				$photo3 = 'table3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'table2.jpg';
				$photo2 = 'table1.jpg'; // set name here
				$photo3 = 'table3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'table3.jpg'; // set name here
				$photo2 = 'table1.jpg';
				$photo3 = 'table2.jpg';
			}
	}
}
	else if ($subcategory === 14) {
		$subsubs = array('kubek'); // names here
		$subsub = $subsubs[0];

		if ($subsub === 'kubek'){ // this name

			$title_sufixes1 = array('ceramika','ładny','herbata'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('kawa', 'pojemny', 'polecam'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('', '', ''); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 1);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(2000, 4000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "List polecony 8 zł, Paczkomat 11 zł."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'mug1.jpg'; // set name here
				$photo2 = 'mug2.jpg';
				$photo3 = 'mug3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'mug2.jpg';
				$photo2 = 'mug1.jpg'; // set name here
				$photo3 = 'mug3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'mug3.jpg'; // set name here
				$photo2 = 'mug1.jpg';
				$photo3 = 'mug2.jpg';
			}

	}
}
	else if ($subcategory === 15) {
		$subsubs = array('sadzonki'); // names here
		$subsub = $subsubs[0];

		if ($subsub === 'sadzonki'){ // this name

			$title_sufixes1 = array('Funkia','Żarnowiec','Wisteria'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('w doniczce', 'z ziemią', 'polecam'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('', '', ''); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 1);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(2000, 4000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Tylko odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'plant1.jpg'; // set name here
				$photo2 = 'plant2.jpg';
				$photo3 = 'plant3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'plant2.jpg';
				$photo2 = 'plant1.jpg'; // set name here
				$photo3 = 'plant3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'plant3.jpg'; // set name here
				$photo2 = 'plant1.jpg';
				$photo3 = 'plant2.jpg';
			}
	}
}

	else if ($subcategory === 16) {
		$subsubs = array('Młotek'); // names here
		$subsub = $subsubs[0];

		if ($subsub === 'Młotek'){ // this name

			$title_sufixes1 = array('stalowy','nierdzewny','mocny'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('polecam', 'warto', 'polecam'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('', '', ''); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 1);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(2000, 4000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczkomat 12zł, kurier 15zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'hammer1.jpg'; // set name here
				$photo2 = 'hammer2.jpg';
				$photo3 = 'hammer3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'hammer2.jpg';
				$photo2 = 'hammer1.jpg'; // set name here
				$photo3 = 'hammer3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'hammer3.jpg'; // set name here
				$photo2 = 'hammer1.jpg';
				$photo3 = 'hammer2.jpg';
			}
	}
}

	else if ($subcategory === 17) {
		$subsubs = array('Panele','Farba'); // names here
		$random_subsub = rand(0, 1); // number of names
		$subsub = $subsubs[$random_subsub];

		if ($subsub === 'Panele'){ // this name

			$title_sufixes1 = array('Nikon','Sony','Leica'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('polecam', 'renomowany', 'profesjonalny'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('warto', 'obiektyw', 'kadr'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(50000, 180000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczka pocztowa polecona 13 zł, Paczkomat 15zł, kurier 20zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'camera1.jpg'; // set name here
				$photo2 = 'camera2.jpg';
				$photo3 = 'camera3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'camera2.jpg';
				$photo2 = 'camera1.jpg'; // set name here
				$photo3 = 'camera3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'camera3.jpg'; // set name here
				$photo2 = 'camera1.jpg';
				$photo3 = 'camera2.jpg';
			}
		}

		else if ($subsub=== 'Farba'){
			$title_sufixes1 = array('fotograficzny','fotograficzny','fotograficzny'); // sufixes here
			$random_title_sufix1 = rand(0, 2); // number of sufixes
			$title_sufix1 = $title_sufixes1[$random_title_sufix1]; 
			$title_sufixes2 = array('polecam', 'renomowany', 'profesjonalny'); // sufixes here
			$random_title_sufix2 = rand(0, 2); // number of sufixes
			$title_sufix2 = $title_sufixes2[$random_title_sufix2];
			$title_sufixes3 = array('warto', 'obiektyw', 'kadr'); // sufixes here
			$random_title_sufix3 = rand(0, 2); // number of sufixes
			$title_sufix3 = $title_sufixes3[$random_title_sufix3];
			$title = $subsub . ' ' . $title_sufix1 . ' ' . $title_sufix2 . ' ' . $title_sufix3;

			$item_conditions = array('nd','Nowe','Powystawowe','Używane','Uszkodzone'); 
			$random_item_condition = rand(0, 4);
			$item_condition = $item_conditions[$random_item_condition]; // can be set to 0 only

			$description = 'Gorąco polecam. W razie pytań zapraszam do kontaktu'; 
			$start_price = rand(50000, 180000) / 100; // set start price here

			$chance_for_min_price = rand(0, 9); 
			if ($chance_for_min_price < 6) { 
				$min_price = round($start_price * 1.25, 2); 
			} 
			$chance_for_end_price = rand(0, 9); 
			if ($chance_for_end_price < 6) { 
				$end_price = round($start_price * 1.5, 2); 
			} 
			$duration = rand(2, 14); 
			require_once 'includes/durationCounter.inc.php';

			$delivery = "Paczka pocztowa polecona 13 zł, Paczkomat 15zł, kurier 20zł. Możliwy odbiór osobisty."; // can set here
			 $query = "SELECT * FROM users WHERE user_id = $owner_id";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {
			$voivodeship = $row['voivodeship_id'];
			$city = $row['city_id'];}
			$random_photo = rand(0,2); // set number here
			if ($random_photo === 0) { 
				$photo1 = 'camera1.jpg'; // set name here
				$photo2 = 'camera2.jpg';
				$photo3 = 'camera3.jpg';
			} 
			else if ($random_photo === 1){
				$photo1 = 'camera2.jpg';
				$photo2 = 'camera1.jpg'; // set name here
				$photo3 = 'camera3.jpg';
			}
			else if ($random_photo === 2){
				$photo1 = 'camera3.jpg'; // set name here
				$photo2 = 'camera1.jpg';
				$photo3 = 'camera2.jpg';
			}
	}
}

	else if ($subcategory === 18) {
		
	}
	else if ($subcategory === 19) {
		
	}
	else if ($subcategory === 20) {
		
	}
	else if ($subcategory === 21) {
		
	}
	else if ($subcategory === 22) {

	}
	else if ($subcategory === 23) {
		
	}
	else if ($subcategory === 24) {
		
	}
	else if ($subcategory === 25) {
		
	}
	else if ($subcategory === 26) {

	}
	else if ($subcategory === 27) {
		
	}
	else if ($subcategory === 28) {
		
	}
	else if ($subcategory === 29) {
		
	}
	else if ($subcategory === 30) {
		
	}
	else if ($subcategory === 31) {
		
	}
	else if ($subcategory === 32) {

	}
	else if ($subcategory === 33) {
		
	}
	else if ($subcategory === 34) {
		
	}
	else if ($subcategory === 35) {
		
	}
	else if ($subcategory === 36) {

	}
	else if ($subcategory === 37) {
		
	}
	else if ($subcategory === 38) {
		
	}
	else if ($subcategory === 39) {
		
	}
	else if ($subcategory === 40) {
		
	}
	else if ($subcategory === 41) {
		
	}
	else if ($subcategory === 42) {

	}
	else if ($subcategory === 43) {
		
	}
	else if ($subcategory === 44) {
		
	}
	else if ($subcategory === 45) {
		
	}
	else if ($subcategory === 46) {

	}
	else if ($subcategory === 47) {
		
	}
	else if ($subcategory === 48) {
		
	}
	else if ($subcategory === 49) {
		
	}
	else if ($subcategory === 50) {
		
	}
	else if ($subcategory === 51) {
		
	}
	else if ($subcategory === 52) {

	}
	else if ($subcategory === 53) {
		
	}
	else if ($subcategory === 54) {
		
	}
	else if ($subcategory === 55) {
		
	}
	else if ($subcategory === 56) {

	}
	else if ($subcategory === 57) {
		
	}
	else if ($subcategory === 58) {
		
	}
	else if ($subcategory === 59) {
		
	}
	else if ($subcategory === 60) {
		
	}
	else if ($subcategory === 61) {
		
	}
	else if ($subcategory === 62) {

	}
	else if ($subcategory === 63) {
		
	}
	else if ($subcategory === 64) {
		
	}
	else if ($subcategory === 65) {
		
	}
	else {

	}
	

















	$sql = "INSERT INTO tenders (owner_id, title, ctgr_id, subctgr_id, item_condition, description, starting_price, current_price, minimal_price, buy_now_price,
	add_date, end_date, delivery, voivodeship_id, city_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../add.php?error=stmtfailed");
		exit();
	}

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

	exit();
}
//populateUsers($conn);
//populateTenders($conn);

