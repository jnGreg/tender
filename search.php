<?php
session_start(); 
include ('includes/config.inc.php');

?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Language"
	content="język" />
	<meta http-equiv="Content-Type"
	content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name = "author" content = "Jan Gregor" />
	<title>Wyszukiwanie </title>
	<link rel="Stylesheet" type= "text/css" href = "css/bootstrap.min.css" />
	<link rel="Stylesheet" type= "text/css" href = "css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="light-theme || dark-theme">
	<header>
		<?php
		require_once "includes/header.inc.php"; ?>
	</header>

	<main>
		<div id = "container_search"> <br><br><br><br><h2> Zawęź wyniki lub szukaj czegoś innego </h2> <br>
			<form class="form-inline" method="GET" action=""><div style="padding: 10px;">
						<input hidden name = "view" value = "<?php if(isset($_GET['view'])) { echo $_GET['view']; } else { echo "list"; }?>"> <div style="width: 1000px;">
						<input class="form-control mr-1" type="search" placeholder="Szukam przedmiotu..." aria-label="wyszukaj" id = "item" name = "k" autocomplete="off" style="width:700px;" maxlength=75 minlength=3 required value="<?php if(isset($_GET['k'])&& $_GET['k'] != '') { echo $_GET['k']; } else { echo ""; } ?>"></div>
						
							<div class="form-group" style="padding: 8px; width:450px; display: block; float:left;"> 
				<select class="form-control" id="category" name="ctgr" style="width:210px;">
					<option selected value="">W kategorii...</option>
					<?php 
						$sql = "SELECT * FROM ctgrs;";
						$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($result)){ 
								?><option value="<?php echo $row["ctgr_id"];?>"><?php echo $row["category"];?></option><?php
							}	
					?>
				</select>
					<select class="form-control" id="subcategory" name="subctgr" style="width:210px;"> 
					<option value="" disabled selected>Wybierz podkategorię...</option>
					</select></div>
					<div class="form-group" style="padding: 8px; width:450px; display: block; float:left;"> 
						<select class="form-control" id="voivodeship" name="voivodeship" style="width:210px;">
							<option value="" selected>Cała Polska...</option>
						<?php 
							$sql = "SELECT * FROM voivodeships;";
							$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_array($result)){ 
									?><option value="<?php echo $row["voivodeship_id"];?>"><?php echo $row["voivodeship"];?></option><?php
								}	
						?>
						</select>
						<select class="form-control" id="city" name="city" style="width:210px;"> 
						<option value="" disabled selected>Wybierz miasto...</option>
							
						</select></div>
						<button class="btn btn-success" type="submit">Szukaj </button></div>
						</form></div>
			<br><br><br><br>
			<h2> Filtruj wyniki </h2> <br>
		  <?php
		//require_once "includes/shortcuts.inc.php"; ?>
		<div id = "bok_prawy" style=" min-height: 450px;">
			<div style="padding-left: 15px; padding-right: 10px; display:inline-flex;">
				<form action="" method="get" style="float:left;">
				<div style="display:inline-flex;">
				<input hidden name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ""; ?>">
				<input hidden name="voivodeship" value="<?php echo isset($_GET['voivodeship']) ? $_GET['voivodeship'] : ""; ?>">
				<input hidden name="city" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ""; ?>">
				<input hidden name="order" value="<?php echo isset($_GET['order']) ? $_GET['order'] : ""; ?>">
				<input hidden name="ctgr" value="<?php echo isset($_GET['ctgr']) ? $_GET['ctgr'] : ""; ?>">
				<input hidden name="subctgr" value="<?php echo isset($_GET['subctgr']) ? $_GET['subctgr'] : ""; ?>">
				<input hidden name="user" value="<?php echo isset($_GET['user']) ? $_GET['user'] : ""; ?>">
				<input hidden name="f_od" value="<?php echo isset($_GET['f_od']) ? $_GET['f_od'] : ""; ?>">
				<input hidden name="f_do" value="<?php echo isset($_GET['f_do']) ? $_GET['f_do'] : ""; ?>">
				<input hidden name="cond" value="<?php echo isset($_GET['cond']) ? $_GET['cond'] : ""; ?>">
					<button class="form-control mr-1" id = "gallery-view" name = "view" value="gallery" type="submit"> 
						<img src = "img/gallery-icon.png" height="25px" width="25px"> </button>
						<button class="form-control mr-1" id = "list-view" name = "view" value="list" type="submit">
							<img src = "img/list-icon.png" height="25px" width="25px"> </button>
						</div></form>
						
			<form class="form-inline" method="GET" action="" id="filtrowanie" style="margin-left: 450px;">
				<input hidden name="view" value="<?php echo $_GET['view']; ?>">
				<input hidden name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ""; ?>">
				<input hidden name="voivodeship" value="<?php echo isset($_GET['voivodeship']) ? $_GET['voivodeship'] : ""; ?>">
				<input hidden name="city" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ""; ?>">
				<input hidden name="order" value="<?php echo isset($_GET['order']) ? $_GET['order'] : ""; ?>">
				<input hidden name="ctgr" value="<?php echo isset($_GET['ctgr']) ? $_GET['ctgr'] : ""; ?>">
				<input hidden name="subctgr" value="<?php echo isset($_GET['subctgr']) ? $_GET['subctgr'] : ""; ?>">
				<input hidden name="user" value="<?php echo isset($_GET['user']) ? $_GET['user'] : ""; ?>">

				<div style="padding-left: 5px;">
				<input class="form-control mr-1" type="number" placeholder="Od..." aria-label="wyszukaj" id = "filtr_od" name = "f_od" min=1 step=0.01>
				<input class="form-control mr-1" type="number" placeholder="Do..." aria-label="wyszukaj" id = "filtr_do" name = "f_do" min=1 step=0.01>
				<script type="text/javascript">
					$("#filtr_od").change(function() {
						 $("#filtr_do").attr('min', $("#filtr_od").val()).toFixed(2);
					});</script>
				<select class="custom-select" id="inputStan" name="cond">
		          <option value="" selected>Stan</option>
		          <option value="Nowe">Nowe</option>
		          <option value="Powystawowe">Powystawowe</option>
		          <option value="Używane">Używane</option>
		          <option value="Uszkodzone">Uszkodzone</option>
				</select>
				<button class="btn btn-primary" type="submit">Filtruj</button> </div>
			</form>

						<form id ="sort-form" class="form-inline" method="GET" action="" style="margin-left: 450px;">
							<input hidden name="view" value="<?php echo $_GET['view']; ?>">
							<input hidden name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ""; ?>">
							<input hidden name="voivodeship" value="<?php echo isset($_GET['voivodeship']) ? $_GET['voivodeship'] : ""; ?>">
							<input hidden name="city" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ""; ?>">
							<input hidden name="order" value="<?php echo isset($_GET['order']) ? $_GET['order'] : ""; ?>">
							<input hidden name="ctgr" value="<?php echo isset($_GET['ctgr']) ? $_GET['ctgr'] : ""; ?>">
							<input hidden name="subctgr" value="<?php echo isset($_GET['subctgr']) ? $_GET['subctgr'] : ""; ?>">
							<input hidden name="user" value="<?php echo isset($_GET['user']) ? $_GET['user'] : ""; ?>">
							<input hidden name="f_od" value="<?php echo isset($_GET['f_od']) ? $_GET['f_od'] : ""; ?>">
							<input hidden name="f_do" value="<?php echo isset($_GET['f_do']) ? $_GET['f_do'] : ""; ?>">
							<input hidden name="cond" value="<?php echo isset($_GET['cond']) ? $_GET['cond'] : ""; ?>">
							<select class="custom-select" id="inputSort" name="order">
								<option value="bids DESC">Po liczbie ofert</option>
								<option value="current_price ASC">Po cenie: rosnąco</option>
								<option value="current_price DESC">Po cenie: malejąco</option>
								<option value="end_date ASC" selected>Do końca: najmniej</option>
								<option value="end_date DESC">Do końca: najwięcej</option>
								<option value="add_date ASC">Od najstarszych</option>
								<option value="add_date DESC">Od najnowszych</option>
								
							</select>

							<button class="btn btn-success" type="submit">Sortuj </button> 
						</form> </div><br><br><br><br>
					
						
						<?php $results_per_page = 32;

						if ($_GET["view"] == "list") { ?>
							<center>
						<section class = "offers">
							<?php 
							$sql = "SELECT * FROM tenders WHERE ";
							if (isset ($_GET['k']) && $_GET['k'] != ''){
								$k = trim($_GET['k']);
								$keywords = explode(' ', $k);
								foreach ($keywords as $word) {
									$sql .= " title LIKE '%".$word."%' OR ";
								}
								$sql = substr($sql, 0, strlen($sql) - 3);
							}
							if (isset ($_GET['voivodeship']) && $_GET['voivodeship'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " voivodeship_id = ".$_GET['voivodeship']." "; }
								else { $sql .= " AND voivodeship_id = ".$_GET['voivodeship']." "; }
							}

							if (isset ($_GET['city']) && $_GET['city'] != ''){
								$sql .= " AND city_id = ".$_GET['city']." ";
							}
							
							if (isset ($_GET['ctgr']) && $_GET['ctgr'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " ctgr_id = ".$_GET['ctgr']." "; }
								else { $sql .= " AND ctgr_id = ".$_GET['ctgr']." "; }
							}

							if (isset ($_GET['subctgr']) && $_GET['subctgr'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " subctgr_id = ".$_GET['subctgr']." "; }
								else { $sql .= " AND subctgr_id = ".$_GET['subctgr']." "; }
							}

							if (isset ($_GET['user']) && $_GET['user'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " owner_id = ".$_GET['user']." "; }
								else { $sql .= " AND owner_id = ".$_GET['user']." "; }
							}

							if (isset ($_GET['cond']) && $_GET['cond'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " (item_condition = '".$_GET['cond']."' OR item_condition = 'nd') "; }
								else { $sql .= " AND (item_condition = '".$_GET['cond']."' OR item_condition = 'nd') "; }
							}

							if (isset ($_GET['f_od']) && $_GET['f_od'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " current_price >= ".$_GET['f_od']." "; }
								else { $sql .= " AND current_price >= ".$_GET['f_od']." "; }
							}

							if (isset ($_GET['f_do']) && $_GET['f_do'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " current_price <= ".$_GET['f_do']." "; }
								else { $sql .= " AND current_price <= ".$_GET['f_do']." "; }
							}

							if (isset ($_GET['order']) && $_GET['order'] != ''){
								$sql .= " ORDER BY ".$_GET['order']." ";
							}
							else { $sql .= " ORDER BY end_date ASC "; } 

							$result = mysqli_query($conn, $sql);
							$number_of_results = mysqli_num_rows($result);

							if ($number_of_results === 0) {
								echo "<br><br><br><br><br><h2>Brak ogłoszeń spełniających podane kryteria.</h2>";
							}

							$number_of_pages = ceil($number_of_results / $results_per_page);
							if (!isset ($_GET['page'])){
								$page = 1;
							} else {
								$page = $_GET['page'];
							}
							$first_result = ($page-1)*$results_per_page;
							$sql .= " LIMIT " . $first_result . ',' . $results_per_page;
							
							$result = mysqli_query($conn, $sql);
							//echo $sql;
							while($row = mysqli_fetch_array($result)) {

								$tender_id = $row['tender_id'];
								$tender_ids[$tender_id] = $row['tender_id'];
								$owner_ids[$tender_id] = $row['owner_id'];
								$titles[$tender_id] = $row['title'];
								$item_conditions[$tender_id] = $row['item_condition'];
								$ctgr_ids[$tender_id] = $row['ctgr_id'];
								$subctgr_ids[$tender_id] = $row['subctgr_id'];
								$current_prices[$tender_id] = $row['current_price'];
								$buy_now_prices[$tender_id] = $row['buy_now_price'];
								$end_dates[$tender_id] = $row['end_date'];
								$add_dates[$tender_id] = $row['add_date'];
								$sql_photo = "SELECT * FROM photos WHERE tender_id = $tender_id LIMIT 1;"; 
								$results_photo = mysqli_query($conn, $sql_photo); 
								while($row_photo = mysqli_fetch_array($results_photo)) {
								$photo_name = $row_photo['photo'];
								$photos[$tender_id] = "img/uploads/".$photo_name; }
								?>
								<article class = "offer"> 
								<div style="width: 1200px; height: 120px; display: inline-flex;">
								<a style="width: 120px; height: 120px;  display: flex; align-items: center; justify-content: center;" href="tender.php?tender_id=<?php echo $tender_ids[$tender_id]; ?>" class = "artykul_zdjecie">
								<img src="<?php echo $photos[$tender_id]; ?>" style="max-width: 120px; max-height: 120px;"></a>
								
								<a href="tender.php?tender_id=<?php echo $tender_ids[$tender_id]; ?>" style="padding-left: 30px; width: 750px;" class = "artykul_nazwa"> <?php echo $titles[$tender_id]; ?><br><br><aside><p style="color:darkgreen;"><?php
								$sql_owner = "SELECT * FROM users WHERE user_id = $owner_ids[$tender_id];"; 
								$results_owner = mysqli_query($conn, $sql_owner); 
								while($row_owner = mysqli_fetch_array($results_owner)) {
								$owner_city_id = $row_owner['city_id'];
								$owner_voivodeship_id = $row_owner['voivodeship_id']; }
								$sql_owner_city = "SELECT * FROM cities WHERE city_id = $owner_city_id;"; 
								$results_owner_city = mysqli_query($conn, $sql_owner_city); 
								while($row_owner_city = mysqli_fetch_array($results_owner_city)) {
								$owner_city_name = $row_owner_city['city']; }
								$sql_owner_voivodeship = "SELECT * FROM voivodeships WHERE voivodeship_id = $owner_voivodeship_id;"; 
								$results_owner_voivodeship = mysqli_query($conn, $sql_owner_voivodeship); 
								while($row_owner_voivodeship = mysqli_fetch_array($results_owner_voivodeship)) {
								$owner_voivodeship_name = $row_owner_voivodeship['voivodeship']; }
								echo $owner_city_name . ", " . $owner_voivodeship_name;?></p></aside></a> <p style="text-align: left;">Do końca: <?php
									$now_date = date("Y-m-d H:i:s");
									$nowDate = new DateTime($now_date);
									$endDate = new DateTime($end_dates[$tender_id]);
									$difference = $nowDate->diff($endDate);
									require_once ('includes/toEndTime.inc.php');
									echo format_interval($difference);?><br><br><br>Ofert: <?php 
														$query = $conn->prepare("SELECT * FROM bids WHERE tender_id = $tender_ids[$tender_id];");
														$query->execute();
														$query->store_result();
														$num_bids = $query->num_rows;
														echo $num_bids;	 ?></p>

							</div> 
								<aside class = "artykul_cena" style="color:black; text-align: right;"><?php echo $current_prices[$tender_id]; ?>&nbspzł<br><br>
									<?php if (isset($buy_now_prices[$tender_id])){ ?>
									<p style="color:darkblue;">kup teraz: <?php echo $buy_now_prices[$tender_id]; ?>&nbspzł</p> <?php } ?></aside>
							</article> <br>
							<?php } if($number_of_results >0) {?>
							<p>Jesteś na stronie: <?php echo $page; ?>.<br>Idź do: <?php for ($page=1; $page<=$number_of_pages; $page++){
								$k = isset($_GET['k']) ? $_GET['k'] : "";
								$ctgr = isset($_GET['ctgr']) ? $_GET['ctgr'] : "";
								$subctgr = isset($_GET['subctgr']) ? $_GET['subctgr'] : "";
								$voivodeship = isset($_GET['voivodeship']) ? $_GET['voivodeship'] : "";
								$city = isset($_GET['city']) ? $_GET['city'] : "";
								$user = isset($_GET['user']) ? $_GET['user'] : "";
								$cond = isset($_GET['cond']) ? $_GET['cond'] : "";
								$f_od = isset($_GET['f_od']) ? $_GET['f_od'] : "";
								$f_do = isset($_GET['f_do']) ? $_GET['f_do'] : "";
								$order = isset($_GET['order']) ? $_GET['order'] : "";
							echo '<a href="search.php?view=' . $_GET['view'] . '&page=' . $page . '&k=' . $k .'&ctgr=' . $ctgr .'&subctgr=' . $subctgr .'&voivodeship=' . $voivodeship .'&city=' . $city .'&user=' . $user .'&cond=' . $cond .'&f_od=' . $f_od .'&f_do=' . $f_do .'&order=' . $order .'">' . $page . " " .'</a>'; } ?> </p> <?php } ?>
							

						</section> </center><?php } 

						else if ($_GET["view"] == "gallery") { ?>
							
						<div class = "offers row justify-content-center" style="display: inline-flex;">
							<?php $sql = "SELECT * FROM tenders WHERE ";
							if (isset ($_GET['k']) && $_GET['k'] != ''){
								$k = trim($_GET['k']);
								$keywords = explode(' ', $k);
								foreach ($keywords as $word) {
									$sql .= " title LIKE '%".$word."%' OR ";
								}
								$sql = substr($sql, 0, strlen($sql) - 3);
							}
							if (isset ($_GET['voivodeship']) && $_GET['voivodeship'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " voivodeship_id = ".$_GET['voivodeship']." "; }
								else { $sql .= " AND voivodeship_id = ".$_GET['voivodeship']." "; }
							}

							if (isset ($_GET['city']) && $_GET['city'] != ''){
								$sql .= " AND city_id = ".$_GET['city']." ";
							}
							
							if (isset ($_GET['ctgr']) && $_GET['ctgr'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " ctgr_id = ".$_GET['ctgr']." "; }
								else { $sql .= " AND ctgr_id = ".$_GET['ctgr']." "; }
							}

							if (isset ($_GET['subctgr']) && $_GET['subctgr'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " subctgr_id = ".$_GET['subctgr']." "; }
								else { $sql .= " AND subctgr_id = ".$_GET['subctgr']." "; }
							}

							if (isset ($_GET['user']) && $_GET['user'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " owner_id = ".$_GET['user']." "; }
								else { $sql .= " AND owner_id = ".$_GET['user']." "; }
							}

							if (isset ($_GET['cond']) && $_GET['cond'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " (item_condition = '".$_GET['cond']."' OR item_condition = 'nd') "; }
								else { $sql .= " AND (item_condition = '".$_GET['cond']."' OR item_condition = 'nd') "; }
							}

							if (isset ($_GET['f_od']) && $_GET['f_od'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " current_price >= ".$_GET['f_od']." "; }
								else { $sql .= " AND current_price >= ".$_GET['f_od']." "; }
							}

							if (isset ($_GET['f_do']) && $_GET['f_do'] != ''){
								if (substr($sql, -6) === "WHERE "){
									$sql .= " current_price <= ".$_GET['f_do']." "; }
								else { $sql .= " AND current_price <= ".$_GET['f_do']." "; }
							}

							if (isset ($_GET['order']) && $_GET['order'] != ''){
								$sql .= " ORDER BY ".$_GET['order']." ";
							}
							else { $sql .= " ORDER BY end_date ASC "; } 

							$result = mysqli_query($conn, $sql);
							$number_of_results = mysqli_num_rows($result);

							if ($number_of_results === 0) {
								echo "<br><br><br><br><br><h2>Brak ogłoszeń spełniających podane kryteria.</h2>";
							}

							$number_of_pages = ceil($number_of_results / $results_per_page);
							if (!isset ($_GET['page'])){
								$page = 1;
							} else {
								$page = $_GET['page'];
							}
							$first_result = ($page-1)*$results_per_page;
							$sql .= " LIMIT " . $first_result . ',' . $results_per_page;
							
							$result = mysqli_query($conn, $sql);
							//echo $sql;
							while($row = mysqli_fetch_array($result)) {

								$tender_id = $row['tender_id'];
								$tender_ids[$tender_id] = $row['tender_id'];
								$owner_ids[$tender_id] = $row['owner_id'];
								$titles[$tender_id] = $row['title'];
								$item_conditions[$tender_id] = $row['item_condition'];
								$ctgr_ids[$tender_id] = $row['ctgr_id'];
								$subctgr_ids[$tender_id] = $row['subctgr_id'];
								$current_prices[$tender_id] = $row['current_price'];
								$buy_now_prices[$tender_id] = $row['buy_now_price'];
								$end_dates[$tender_id] = $row['end_date'];
								$add_dates[$tender_id] = $row['add_date'];
								$sql_photo = "SELECT * FROM photos WHERE tender_id = $tender_id LIMIT 1;"; 
								$results_photo = mysqli_query($conn, $sql_photo); 
								while($row_photo = mysqli_fetch_array($results_photo)) {
								$photo_name = $row_photo['photo'];
								$photos[$tender_id] = "img/uploads/".$photo_name; }
								?>
								<div style="width: 360px; height: 470px; margin:20px; display: inline-block; background-color: white; margin-bottom: 45px;">
								<a style="width: 360px; height: 240px;  display: flex; align-items: center; justify-content: center;" href="tender.php?tender_id=<?php echo $tender_ids[$tender_id]; ?>" class = "artykul_zdjecie">
								<img src="<?php echo $photos[$tender_id]; ?>" style="max-width: 360px; max-height: 240px;"></a>
								<div style="width: 360px; height: 110px; background-color: white;">
								<a href="tender.php?tender_id=<?php echo $tender_ids[$tender_id]; ?>" class = "artykul_nazwa"> <?php echo $titles[$tender_id]; ?></a></div>
								<div style="width: 180px; height: 60px; background-color: white; display: inline-flex;">
								<p style="color:darkgreen;"><?php
								$sql_owner = "SELECT * FROM users WHERE user_id = $owner_ids[$tender_id];"; 
								$results_owner = mysqli_query($conn, $sql_owner); 
								while($row_owner = mysqli_fetch_array($results_owner)) {
								$owner_city_id = $row_owner['city_id'];
								$owner_voivodeship_id = $row_owner['voivodeship_id']; }
								$sql_owner_city = "SELECT * FROM cities WHERE city_id = $owner_city_id;"; 
								$results_owner_city = mysqli_query($conn, $sql_owner_city); 
								while($row_owner_city = mysqli_fetch_array($results_owner_city)) {
								$owner_city_name = $row_owner_city['city']; }
								$sql_owner_voivodeship = "SELECT * FROM voivodeships WHERE voivodeship_id = $owner_voivodeship_id;"; 
								$results_owner_voivodeship = mysqli_query($conn, $sql_owner_voivodeship); 
								while($row_owner_voivodeship = mysqli_fetch_array($results_owner_voivodeship)) {
								$owner_voivodeship_name = $row_owner_voivodeship['voivodeship']; }
								echo $owner_city_name . ", " . $owner_voivodeship_name;?></p></div>
								<div style="width: 180px; height: 120px; background-color: white; float: right; text-align: right;"><h4><?php echo $current_prices[$tender_id]; ?>&nbspzł</h4><br><br>
									<?php if (isset($buy_now_prices[$tender_id])){ ?><p style="color:darkblue;">kup teraz: <?php echo $buy_now_prices[$tender_id]; ?>&nbspzł</p><?php } ?>
								</div>
								<div style="width: 180px; height: 60px; background-color: white; float: right; text-align: right;"><p style="text-align: left;">p. <?php
									$now_date = date("Y-m-d H:i:s");
									$nowDate = new DateTime($now_date);
									$endDate = new DateTime($end_dates[$tender_id]);
									$difference = $nowDate->diff($endDate);
									require_once ('includes/toEndTime.inc.php');
									echo format_interval($difference);?><br>Ofert: <?php 
														$query = $conn->prepare("SELECT * FROM bids WHERE tender_id = $tender_ids[$tender_id];");
														$query->execute();
														$query->store_result();
														$num_bids = $query->num_rows;
														echo $num_bids;	 ?></p></div>

							
							</div><br>
							 <?php } ?> </div><div style="width:1000px; text-align: center; margin-left: 400px;"><?php if($number_of_results >0) { ?> <p>Jesteś na stronie: <?php echo $page; ?>.<br>Idź do: <?php for ($page=1; $page<=$number_of_pages; $page++){
							$k = isset($_GET['k']) ? $_GET['k'] : "";
								$ctgr = isset($_GET['ctgr']) ? $_GET['ctgr'] : "";
								$subctgr = isset($_GET['subctgr']) ? $_GET['subctgr'] : "";
								$voivodeship = isset($_GET['voivodeship']) ? $_GET['voivodeship'] : "";
								$city = isset($_GET['city']) ? $_GET['city'] : "";
								$user = isset($_GET['user']) ? $_GET['user'] : "";
								$cond = isset($_GET['cond']) ? $_GET['cond'] : "";
								$f_od = isset($_GET['f_od']) ? $_GET['f_od'] : "";
								$f_do = isset($_GET['f_do']) ? $_GET['f_do'] : "";
								$order = isset($_GET['order']) ? $_GET['order'] : "";
							echo '<a href="search.php?view=' . $_GET['view'] . '&page=' . $page . '&k=' . $k .'&ctgr=' . $ctgr .'&subctgr=' . $subctgr .'&voivodeship=' . $voivodeship .'&city=' . $city .'&user=' . $user .'&cond=' . $cond .'&f_od=' . $f_od .'&f_do=' . $f_do .'&order=' . $order .'">' . $page . " " .'</a>';  } } ?>
							</p><?php } ?></div> 
				</div> 

			</main>
			<footer> 
				<?php
						require_once "includes/footer.inc.php"; ?>
			</footer>

			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/toggleDarkLight.js"></script>
			<script type="text/javascript" src="js/jquery.js">  </script>
		</body>

		</html>


