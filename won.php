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
	<title>Wygrane </title>
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
		<div id = "container_search"> <br><br><br><h2> Wygrane ogłoszenia </h2> <br><br><br></div>
			
		  <?php
		//require_once "includes/shortcuts.inc.php"; ?>
		<div id = "bok_prawy" style=" min-height: 556px;">
			
					
						
						<?php $results_per_page = 32;

						if ($_GET["view"] == "list") { ?>
							<center>
						<section class = "offers">
							<?php 
							$sql = "SELECT * FROM archive WHERE winner_id = '".$_SESSION['userid']."'";
							
							$result = mysqli_query($conn, $sql);
							$number_of_results = mysqli_num_rows($result);

							if ($number_of_results === 0) {
								echo "<br><br><br><br><br><h2>Nie wygrałeś żadnych ogłoszeń.</h2>";
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
							
							while($row = mysqli_fetch_array($result)) {
								$tender_id = $row['tender_id'];
							
							$sql_tender = "SELECT * FROM archive WHERE tender_id = $tender_id;";

							$result_tender = mysqli_query($conn, $sql_tender);
							while($row = mysqli_fetch_array($result_tender)) {
								$archive_id = $row['archive_id'];
								$archive_ids[$tender_id] = $row['archive_id'];
								$tender_id = $row['tender_id'];
								$tender_ids[$tender_id] = $row['tender_id'];
								$owner_ids[$tender_id] = $row['owner_id'];
								$titles[$tender_id] = $row['title'];
								$item_conditions[$tender_id] = $row['item_condition'];
								$ctgr_ids[$tender_id] = $row['ctgr_id'];
								$subctgr_ids[$tender_id] = $row['subctgr_id'];
								$end_prices[$tender_id] = $row['end_price'];
								$end_dates[$tender_id] = $row['end_date'];
								$end_conditios[$tender_id] = $row['end_condition'];
								$sql_photo = "SELECT * FROM photos WHERE tender_id = $tender_id LIMIT 1;"; 
								$results_photo = mysqli_query($conn, $sql_photo); 
								while($row_photo = mysqli_fetch_array($results_photo)) {
								$photo_name = $row_photo['photo'];
								$photos[$tender_id] = "img/uploads/".$photo_name; } 
								?>
								<article class = "offer"> 
								<div style="width: 1200px; height: 120px; display: inline-flex;">
								<a style="width: 120px; height: 120px;  display: flex; align-items: center; justify-content: center;" href="archive.php?archive_id=<?php echo $archive_ids[$tender_id]; ?>" class = "artykul_zdjecie">
								<img src="<?php echo $photos[$tender_id]; ?>" style="max-width: 120px; max-height: 120px;"></a>
								
								<a href="archive.php?archive_id=<?php echo $archive_ids[$tender_id]; ?>" style="padding-left: 30px; width: 750px;" class = "artykul_nazwa"> <?php echo $titles[$tender_id]; ?><br><br><aside><p style="color:darkgreen;"><?php
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
								echo $owner_city_name . ", " . $owner_voivodeship_name;?></p></aside></a> <p style="text-align: left;">Zakończona: <?php
									echo $end_dates[$tender_id];?><br><br><br>Sposób: <?php 
														if ($end_conditios[$tender_id] === "Buy Now") { echo "Zakup natychmiastowy"; } else { echo "Koniec czasu licytacji."; } ?></p>

							</div> 
								<aside class = "artykul_cena" style="color:black; text-align: right;"><?php echo $end_prices[$tender_id]; ?>&nbspzł<br><br>
									</aside>
							</article> <br>
							<?php  }} if($number_of_results >0) {?>
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
							echo '<a href="won.php?view=' . $_GET['view'] . '&page=' . $page . '&k=' . $k .'&ctgr=' . $ctgr .'&subctgr=' . $subctgr .'&voivodeship=' . $voivodeship .'&city=' . $city .'&user=' . $user .'&cond=' . $cond .'&f_od=' . $f_od .'&f_do=' . $f_do .'&order=' . $order .'">' . $page . " " .'</a>'; } ?> </p> <?php } ?>
							

						</section> </center><?php } ?>
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


