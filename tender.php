

<?php
require ('includes/config.inc.php');
session_start(); 

$sql = "SELECT * FROM tenders WHERE tender_id = '".$_GET['tender_id']."'"; 
$results = mysqli_query($conn, $sql); 
if(mysqli_num_rows($results)>0){
while($row = mysqli_fetch_array($results)) {
	$tender_id = $row['tender_id'];
	$owner_id = $row['owner_id'];
	$title = $row['title'];
	$ctgr_id = $row['ctgr_id'];
	$subctgr_id = $row['subctgr_id'];
	$item_condition = $row['item_condition'];
	$description = $row['description'];
	$starting_price = $row['starting_price'];
	$current_price = $row['current_price'];
	$minimal_price = $row['minimal_price'];
	$buy_now_price = $row['buy_now_price'];
	$add_date = $row['add_date'];
	$end_date = $row['end_date'];
	$delivery = $row['delivery'];
}
}
else {header("location: index.php");
		echo "<script>alert('Ogłoszenie zostało zakończone.')</script>";
				exit();}
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
	<title>Ogłoszenie <?php echo $tender_id; ?></title>
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
		<center>
			<div id = "container" style="width:1000px; margin-top: 120px; margin-bottom: 120px;">
				<h2>Szukaj czegoś innego</h2><br>
			<?php 
			require_once "includes/search.inc.php";?>
			</div> <br>
			<div id = "container_tender"><center>
				<p style="align:left;"><a href="index.php">Strona główna</a>&nbsp>>>&nbsp<?php $query = "SELECT * FROM ctgrs WHERE ctgr_id = '$ctgr_id';";
				$results = mysqli_query($conn, $query); 
				while($row = mysqli_fetch_array($results)) {
					?>
					<a href="search.php?view=list&ctgr=<?php echo $row['ctgr_id'];?>"><?php echo $row['category']; } ?> 
					</a>&nbsp>>>&nbsp<?php 
					$query = "SELECT * FROM subctgrs WHERE subctgr_id = '$subctgr_id';";
					$results = mysqli_query($conn, $query); 
					while($row = mysqli_fetch_array($results)) {
					?><a href="search.php?view=list&subctgr=<?php echo $row['subctgr_id'];?>"> <?php echo $row['subcategory']; } ?></a></p>
					<div id = "tender_image" style="border-radius: 15px; background:white; background-size: cover;">
						<center>
							<?php 
							$sql = "SELECT * FROM photos WHERE tender_id = '$tender_id';"; 
							$results = mysqli_query($conn, $sql); 
							$query = $conn->prepare("SELECT * FROM photos WHERE tender_id = '$tender_id';");
							$query->execute();
							$query->store_result();
							$num_photos = $query->num_rows;
							if ($num_photos === 0){
								$photoName = "no_photo.jpg";
								$photoPath = "img/uploads/".$photoName;
								?>
								<div style="width: 596px; height: 596px; display: flex; align-items: center; justify-content: center;">
									<img id="image" style="display: block; max-height: 100%; max-width:100%;" src="<?php echo $photoPath; ?>"> 
								</div></center>
								</div> <?php }
								else if ($num_photos === 1){
									while($row = mysqli_fetch_array($results)) { 
										$photoName = $row['photo'];
										$photoPath = "img/uploads/".$photoName;
									}
									?>
									<div style="width: 596px; height: 596px; display: flex; align-items: center; justify-content: center;">
										<img id="image" style="display: block; max-height: 100%; max-width:100%;" src="<?php echo $photoPath; ?>"> 
									</div></center>
									</div><?php 
										}
										else {
											while($row = mysqli_fetch_array($results)) { 
												$photoName = $row['photo'];
												$photoPaths[] = "img/uploads/".$photoName; } ?>
												<div style="width: 596px; height: 596px; display: flex; align-items: center; justify-content: center;">
													<img id="chosen_image" style="display: block; max-height: 100%; max-width:100%; "
													src="<?php echo $photoPaths[0]; ?>"></div>
												</center>
											</div>
											<?php for ($x=1; $x<=$num_photos ;$x++) { ?>
												<button id="change_photo<?php echo $x;?>" class="btn-link"><img src="<?php echo $photoPaths[$x-1];?>" height="56px" width="56px" style="object-fit: contain; object-position: center;"></button>

											<?php }
											if ($num_photos === 2){
												$photoPaths[2] = $photoPaths[0];
												$photoPaths[3] = $photoPaths[1];
												$photoPaths[4] = $photoPaths[0];
											}
											else if ($num_photos === 3){
												$photoPaths[3] = $photoPaths[1];
												$photoPaths[4] = $photoPaths[0];
											}
											else if ($num_photos === 4){
												$photoPaths[4] = $photoPaths[0];
											}
											?>
									<script> 
											let img = document.querySelector('img');
											let btn1 = document.querySelector('#change_photo1');
											let btn2 = document.querySelector('#change_photo2');
											let btn3 = document.querySelector('#change_photo3');
											let btn4 = document.querySelector('#change_photo4');
											let btn5 = document.querySelector('#change_photo5');

											btn1.addEventListener('click', () => {
											img.src = '<?php echo $photoPaths[0];?>';
											})
											btn2.addEventListener('click', () => {
											img.src = '<?php echo $photoPaths[1];?>';
											})
											btn3.addEventListener('click', () => {
											img.src = '<?php echo $photoPaths[2];?>';
											})
											btn4.addEventListener('click', () => {
											img.src = '<?php echo $photoPaths[3];?>';
											})
											btn5.addEventListener('click', () => {
											img.src = '<?php echo $photoPaths[4];?>';
											})

										</script> <?php 
													} ?>
								<section>
									<div id = "tender_info">
										<hgroup>
											<h2><?php echo $title; ?></h2> 
										</hgroup><br>
										<aside id = "tender_price"> <b style="font-size:20px">Aktualna kwota licytacji wynosi: <?php
										$sql = "SELECT current_price FROM tenders WHERE tender_id = '$tender_id'"; 

										$result = $conn->prepare($sql);
										$result -> execute();
										$data = $result -> get_result();
										$allData = $data -> fetch_all(MYSQLI_ASSOC);

										foreach ($allData as $record){
											echo '<tr>';
											foreach ($record as $value){
												echo '<td>'. $value;
											}
										}
										echo '</table>';
										if ($value >= 200){
											$minimalna_licytacja = $value + 1;}
											else {$minimalna_licytacja = $value + 0.5;}

											?> zł </b></aside> 

											<br><div style="float:right;"><?php $sql = "SELECT tender_id, current_price FROM tenders WHERE tender_id = '$tender_id'"; 


											$result = $conn->prepare($sql);
											$result -> execute();
											$data = $result -> get_result();
											$allData = $data -> fetch_all(MYSQLI_ASSOC);

											if (isset($_SESSION['userid']) and $owner_id != $_SESSION['userid']) {
												echo '<form method=post action=includes/bid.inc.php>';
												foreach ($allData as $record){
													echo "<input name=f_user_id value=$_SESSION[userid] hidden>";
													echo "<input name=f_tender_id value=$record[tender_id] hidden>";
													echo "<input type=number step=0.01 name=f_current_price min=$minimalna_licytacja value=$record[current_price]>";
												} 
												echo '<input type=submit value=Licytuję class="btn-dark">'; 
												?> </form></div> 
												<br> 
												<aside id = "tender_min_check" style="float:left"> <p style="color:red"><?php $sql2 = "SELECT minimal_price FROM tenders WHERE tender_id = '$tender_id'"; 

												$result2 = $conn->prepare($sql2);
												$result2 -> execute();
												$data2 = $result2 -> get_result();
												$allData2 = $data2 -> fetch_all(MYSQLI_ASSOC);

												foreach ($allData2 as $record2){
													echo '<tr>';
													foreach ($record2 as $value2){
														echo '<td>'; }
													}
													if ($value < $value2) {echo 'Cena minimalna nie została osiągnięta.'; }
													?> </p></aside> <br> <div style="float:right;"><?php echo 'Minimalna kwota by przebić: '. $minimalna_licytacja . ' zł.';} else { ?><aside id = "tender_min_check" style="float:left;"> <p style="color:red"><?php $sql2 = "SELECT minimal_price FROM tenders WHERE tender_id = '$tender_id'"; 

													$result2 = $conn->prepare($sql2);
													$result2 -> execute();
													$data2 = $result2 -> get_result();
													$allData2 = $data2 -> fetch_all(MYSQLI_ASSOC);

													foreach ($allData2 as $record2){
														echo '<tr>';
														foreach ($record2 as $value2){
															echo '<td>'; }
														}
														if ($value < $value2) {echo 'Cena minimalna nie została osiągnięta.'; }?> </p></aside> <?php } 

														?>
														<br><p>Ofert: <?php 
														$query = $conn->prepare("SELECT * FROM bids WHERE tender_id = '$tender_id';");
														$query->execute();
														$query->store_result();
														$num_bids = $query->num_rows;
														echo $num_bids;	if ($num_bids > 0) { 
														$query_max = "SELECT MAX(bid) AS top_bid FROM bids WHERE tender_id = '$tender_id';";
														$results_max = mysqli_query($conn, $query_max); 
														while($row = mysqli_fetch_array($results_max)) {
														$top_bid = $row['top_bid'];}
														if ($top_bid >= $minimal_price) { 
														?><br>Wygrywa: <?php 
														$query_bidder = "SELECT user_id FROM bids WHERE tender_id = '$tender_id' AND bid = '$top_bid';";
														$results_bidder = mysqli_query($conn, $query_bidder); 
														while($row = mysqli_fetch_array($results_bidder)) {
														$top_bidder = $row['user_id'];}
														$query_top = "SELECT * FROM users WHERE user_id = $top_bidder;";
														$results_top = mysqli_query($conn, $query_top); 
														while($row = mysqli_fetch_array($results_top)) {
														$top_bidder_name = $row['username'];}
														
														 if (isset($_SESSION['userid'])) { if ($top_bidder_name === $_SESSION['username']) { echo $top_bidder_name." (Ty)"; } else { echo $top_bidder_name; } } else { 
															$first_char = substr($top_bidder_name, 0 ,1);
															$stars = "";
															for ($x = 0; $x <strlen($top_bidder_name)-1; $x++) { $stars .= "*"; } 
															echo $first_char . $stars; } }}?> </h2></p>


													 </div><br><br><br><br><center><h5>Do końca licytacji pozostało:</h5><div id="countdown" class="countdown" style="display: inline-flex;">
													 		<div class="time" style="display: inline-flex;">
													 			<h4 id="days">00</h4><h4>&nbspdni,&nbsp&nbsp</h4>
													 			<h4 id="hours">,&nbsp&nbsp00</h4><h4>&nbsp:&nbsp</h4>
													 			<h4 id="minutes">:&nbsp00</h4><h4>&nbsp:&nbsp</h4>
													 			<h4 id="seconds">:&nbsp00</h4>
													 		 </div>
													 	 </div>
													 	 </center> <?php 
													 	 $endDate = date("F j Y H:i:s", strtotime($end_date));
														?>
													 	 <script >
													 	 	const days = document.getElementById('days');
													 	 	const hours = document.getElementById('hours');
													 	 	const minutes = document.getElementById('minutes');
													 	 	const seconds = document.getElementById('seconds');
													 	 	const endYear = new Date().getFullYear();
													 	 	const endTime = new Date(`<?php echo $endDate; ?>`);

													 	 	function updateCountdown() {
													 	 		const currentTime = new Date();
													 	 		const diff = endTime - currentTime;
													 	 		if (diff > 0){
													 	 		const d = Math.floor(diff / 1000 / 60 / 60 / 24);
													 	 		const h = Math.floor(diff / 1000 / 60 / 60) % 24;
													 	 		const m = Math.floor(diff / 1000 / 60 ) % 60;
													 	 		const s = Math.floor(diff / 1000 ) % 60;
													 	 		days.innerHTML = d;
													 	 		hours.innerHTML = h < 10 ? '0' + h : h;
													 	 		minutes.innerHTML = m < 10 ? '0' + m : m;
													 	 		seconds.innerHTML = s < 10 ? '0' + s : s;
													 	 	} else { days.innerHTML = 0;
													 	 		hours.innerHTML = 0;
													 	 		minutes.innerHTML = 0;
													 	 		seconds.innerHTML = 0;}
													 	 	}
													 	 	
													 	 	setInterval(updateCountdown, 1000);
													 </script>
													<?php

													$sql_buy_now_price = "SELECT buy_now_price FROM tenders WHERE tender_id = '$tender_id'"; 
													$result = $conn->prepare($sql_buy_now_price);
													$result -> execute();
													$data = $result -> get_result();
													$allData = $data -> fetch_all(MYSQLI_ASSOC);

													foreach ($allData as $record){
														foreach ($record as $buy_now_value){
														}
													} 
													if ($buy_now_value > 0) { ?><br> 
													<br> <aside id = "buy_now_price"> <b style="font-size:20px">  Ten przedmiot moż<?php if (isset($_SESSION['userid']) and $owner_id != $_SESSION['userid']) { echo "esz"; } else { echo "na"; } ?> również zakupić natychmiastowo za: <?php echo $buy_now_value;
													?> zł </b> <div style="float:right;"> <?php if (isset($_SESSION['userid']) and $owner_id != $_SESSION['userid']) { echo '<form method=post action=includes/buyNow.inc.php>';
													echo '<input class="btn-success" type=submit value="Kup Teraz" name="submit_buy_now">'; } ?> 
													<input hidden type="number" value="<?php echo $tender_id; ?>" name="tender_id">
													<input hidden type="number" value="<?php echo $buy_now_value; ?>" name="buy_now_value"></form> </div></aside> <br><?php } ?> <br> 
														<p>Stan:&nbsp<?php if($item_condition !== "nd") {echo $item_condition;} else { echo "Nie podano/ nie dotyczy."; } ?></p>
														<br>
															<p>Opis:&nbsp<?php if($description !== "") {echo $description;} else {echo "Do tego ogłoszenia nie dodano opisu.";} ?></p>
														<br><br>
														
														<footer id = "ten_foo">
															<ol id ="tender_footer" list-style-type="none" >
																<li><p>Start:&nbsp<?php echo $add_date; ?> </p></li>
																<li><p>|</p></li>
																<li><p>Koniec:&nbsp<?php echo $end_date; ?></p></li> 
																<li><p>|</p></li>
																<li> <p>ID:&nbsp<?php echo $tender_id; ?></p></li>
															</ol></footer>
														</div>
													</section>
												</center> <br><br><br><br>
											</div>

											<div id = "container_contact">
													<p><h2>Oferuje:&nbsp<?php 
						$query = "SELECT * FROM users WHERE user_id = '$owner_id';";
						$results = mysqli_query($conn, $query); 
						while($row = mysqli_fetch_array($results)) {
							echo $row['first_name'];?>&nbsp</h2></]>
							<p><h5>e-mail:&nbsp<?php if(isset($_SESSION['userid'])){ echo $row['email'];} else { echo "ukryty"; }?>&nbsp</h5></p>
							<p><h5>tel.:&nbsp<?php if(isset($_SESSION['userid'])){ echo $row['phone'];} else { echo substr($row['phone'],0,3) ."******"; }?>&nbsp</h5></p>

							<p><a href="search.php?view=list&user=<?php echo $owner_id;?>" class="btn-info btn-lg round" href="search.php?owner_id=<?php echo $owner_id; ?>">Pozostałe ogłoszenia Użytkownika</a></p>
						</p>
					</div>
					<div id = "container_contact">
						<?php $owner_city_id = $row['city_id'];
						$owner_voivodeship_id = $row['voivodeship_id'];
					}
													$query = "SELECT * FROM cities WHERE city_id = '$owner_city_id';";
													$results = mysqli_query($conn, $query); 
													while($row = mysqli_fetch_array($results)) {
														$owner_city_name = $row['city'];}
													$query = "SELECT * FROM voivodeships WHERE voivodeship_id = '$owner_voivodeship_id';";
													$results = mysqli_query($conn, $query); 
													while($row = mysqli_fetch_array($results)) {
														$owner_voivodeship_name = $row['voivodeship'];}
												?><br><br>
												Lokalizacja:&nbsp <?php echo $owner_city_name; ?>,&nbsp<?php echo $owner_voivodeship_name; ?>&nbsp<br><br>
												<div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
													<iframe src="https://maps.google.com/maps?q=<?php echo $owner_city_name;?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
													style="border:0" allowfullscreen></iframe>
												</div>
												<br><br><h5>Sposoby dostawy:</h5>
												<?php if($delivery !== "") {echo $delivery;} else {echo "Do tego ogłoszenia nie wskazano sposobów dostawy.";} ?><br><br><br><br>
												<?php if (isset($_SESSION['userid']) and $owner_id != $_SESSION['userid']) { ?>
												<p><form method = "post" action = "includes/observe.inc.php">
													<input type="number" name="f_tender_id" value="<?php echo $tender_id; ?>" hidden>
													<button type="submit" name="f_submit" class="btn-warning round">Obserwuj</button></form></p> <?php 

													if(isset($_GET["error"])){ 
														if ($_GET["error"] == "stmtfailed"){
															echo "<h2 style='color:red;'>Coś poszło nie tak. Spróbuj ponownie!</h2>";
														} 
														else if ($_GET["error"] == "alreadywatched"){
															echo "<h2 style='color:red;'>Obserwujesz już tę aukcję!</h2>";
														} 
														else {
															echo "<h2 style='color:blue;'>Dodano do obserwowanych!</h2>";
														}
													}
												} ?>
											</div>

										</main>
											<footer>
												<?php 
												require_once "includes/footer.inc.php"; ?>
											</footer>

											<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
											<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
											<script src="js/bootstrap.min.js"></script>
											<script src="js/toggleDarkLight.js"></script>
											<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
											<script type="text/javascript" src="js/jquery.js">  </script>
										</body>

										</html>


										<?php $conn->close(); ?>

