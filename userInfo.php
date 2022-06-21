<?php 

require ('includes/config.inc.php');
session_start(); 

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
	<title>Informacje o Użytkowniku</title>
	<link rel="Stylesheet" type= "text/css" href = "css/bootstrap.min.css" />
	<link rel="Stylesheet" type= "text/css" href = "css/style.css" />

</head>
<body class="dark-theme || light-theme">
	<header>
		<?php
		require_once "includes/header.inc.php"; ?>
	</header>

	<main>
		<center><br><br><br>
		<head><h2>Użytkownik: <?php echo $_SESSION['username']; ?></h2></head><br><br>
		<div id="user_info" style="text-align: left; margin-left: 25%; margin-right: 20%; height: 589px;">
		<?php 
		$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['userid']."';";
		$results = mysqli_query($conn, $sql); 
		while($row = mysqli_fetch_array($results)) {
	
				?><article><h4 id="info"></h4></article>
					<b>Imię: </b><?php echo $row['first_name']; ?><br><br>
					<b>Email: </b><?php echo $row['email']; ?><br>	
					<b>Nr tel.: </b><?php echo $row['phone']; ?><br><br>
					<b>Województwo: </b><?php
					$sql_v = "SELECT * FROM voivodeships WHERE voivodeship_id = '".$row['voivodeship_id']."';";
					$results_v = mysqli_query($conn, $sql_v); 
					while($row_v = mysqli_fetch_array($results_v)) {
					echo $row_v['voivodeship']; }?><br>
					<b>Miasto: </b><?php
					$sql_c = "SELECT * FROM cities WHERE city_id = '".$row['city_id']."';";
					$results_c = mysqli_query($conn, $sql_c); 
					while($row_c = mysqli_fetch_array($results_c)) {
					echo $row_c['city']; }?><br>
					
					<br><br></div> <?php } ?>
			</center>
			</main>
			<footer>
				<?php
						require_once "includes/footer.inc.php"; ?>
			</footer>
		</div> </div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/toggleDarkLight.js"></script>
	</body>

	</html>


