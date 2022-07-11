<?php
require ('includes/config.inc.php');
session_start(); 

$sql = "SELECT * FROM archive WHERE archive_id = '".$_GET['archive_id']."'"; 
$results = mysqli_query($conn, $sql); 
while($row = mysqli_fetch_array($results)) {
	$archive_id = $row['archive_id'];
	$tender_id = $row['tender_id'];
	$owner_id = $row['owner_id'];
	$winner_id = $row['winner_id'];
	$title = $row['title'];
	$ctgr_id = $row['ctgr_id'];
	$subctgr_id = $row['subctgr_id'];
	$item_condition = $row['item_condition'];
	$description = $row['description'];
	$end_price = $row['end_price'];
	$end_date = $row['end_date'];
	$end_condition = $row['end_condition'];
	$delivery = $row['delivery'];
	$voivodeship_id = $row['voivodeship_id'];
	$city_id = $row['city_id'];
	$bids = $row['bids'];
	$photo = $row['photo'];

}
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
	<title>Archiwum <?php echo $tender_id; ?></title>
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
			</div> <br><h2>To ogłoszenie zostało zakończone <?php echo $end_date; ?></h2>
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
							$photoPath = "img/uploads/".$photo;
							?>
							<div style="width: 596px; height: 596px; display: flex; align-items: center; justify-content: center;">
								<img id="image" style="display: block; max-height: 100%; max-width:100%;" src="<?php echo $photoPath; ?>"
								> </div></center>
							</div> 
							<section>
								<div id = "tender_info">
									<hgroup>
										<h2><?php echo $title; ?></h2> 
									</hgroup><br>
									<aside id = "tender_price"> <b style="font-size:20px">To ogłoszenie zakończyło się poprzez: <?php if ($end_condition === "Buy Now") { echo "Zakup natychmiastowy"; } else { echo "Koniec czasu licytacji."; } ?>  </b></aside> 

									<br><br><br><div style="text-align: center;"><b style="font-size:20px"> <?php if ($end_price > 0 ) {echo "Cena wyniosła: " . $end_price . " zł"; } else { echo "Nie było ofert kupna."; }?></b></div>
									<br> 
									<p> <?php if ($bids > 0){
										echo "Ofert: " . $bids; }?><br><?php if (isset ($winner_id)) { ?>Wygrał: <?php 
											$query_winner = "SELECT * FROM users WHERE user_id = $winner_id;";
											$results_winner = mysqli_query($conn, $query_winner); 
											while($row = mysqli_fetch_array($results_winner)) {
												$winner_name = $row['username']; echo $winner_name; } }?> </p>


												<br><br>
												
												<p>Stan:&nbsp<?php if($item_condition !== "nd") {echo $item_condition;} else { echo "Nie podano/ nie dotyczy."; } ?></p>
												<br>
												<p>Opis:&nbsp<?php if($description !== "") {echo $description;} else {echo "Do tego ogłoszenia nie dodano opisu.";} ?></p>
												<br>
												<footer id = "ten_foo">
													
													<center><p>ID ogłoszenia:&nbsp<?php echo $tender_id; ?></p></center>
												</footer>
											</section>
										</center> <br><br><br>
									</div>

									<div id = "container_contact">
										<p><h2>Oferował/-a:&nbsp<?php 
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
											<?php 

											if(isset($_GET["error"])){ 
												if ($_GET["error"] == "stmtfailed"){
													echo "<h2 style='color:red;'>Coś poszło nie tak. Spróbuj ponownie!</h2>";
												} 
											}
											?>
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

