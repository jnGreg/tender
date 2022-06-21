<?php
include "includes/config.inc.php";
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
	<title>Załóż konto</title>
	<link rel="Stylesheet" type= "text/css" href = "css/bootstrap.min.css" />
	<link rel="Stylesheet" type= "text/css" href = "css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="dark-theme || light-theme">
	<header>
		<?php
		require_once "includes/header.inc.php"; ?>
	</header>

	<main><center> 
		<div id = "container" class="container-fluid" style="background-color: #E4FAFF; border-radius: 25px;">
			<form method="POST" action="includes/register.inc.php"> <br><h4> Załóż Konto Użytkownika Tender </h4><br>
				<?php   
				if(isset($_GET["error"])){ 
					if ($_GET["error"] == "emptyinput"){
						echo "<h2 style='color:red;'>Wypełnij wszystkie pola.</h2>";
					}}?>
				<div id="register_div" class="col-4 col-sm-5 col-md-6 col-lg-7 col-xl-8" ><br><br>
					<div class="form-group">
				 <!--- part 1 z danymi osobowymi --->
				 <div class="form-row">
				 	<div class="form-group col-md-5" style="text-align: left">Tak będziemy się do Ciebie zwracać
					</div>
					<?php   
					if(isset($_GET["error"])){ 
					if ($_GET["error"] == "invalidname"){
						echo "<h2 style='color:red;'>Wprowadź poprawne imię.</h2>";
					} }?>
					
				 <div class="form-group col-md-6"> 
					<input class="form-control" type="text" placeholder="Imię..." name = "f_first_name" ></div>
					</div><br><br><h5 style="text-align: left"> Dane kontaktowe </h5><br>
					<div class="form-row" >
					<br>
					<div class="form-row"> 
					<div class="form-group col-md-3">
					<input class="form-control" type="number" placeholder="+48" name = "f_area_code" disabled></div>  
					<div class="form-group col-md-8">
					<input class="form-control" type="number" placeholder="Numer telefonu..." name = "f_phone" size="32"></div></div>
					<?php   
					if(isset($_GET["error"])){ 
					if ($_GET["error"] == "invalidphone"){
						echo "<h2 style='color:red;'>Długość numeru tel. wynosić ma 9 znaków.</h2>";
					} }?>
					<div class="form-group">
					<input class="form-control" type="email" placeholder="Adres email..." name = "f_email" size="42"> </div>
					<?php   
					if(isset($_GET["error"])){ 
					if ($_GET["error"] == "invalidemail"){
						echo "<h2 style='color:red;'>Niepoprawny adres email.</h2>";
					} 
					else if ($_GET["error"] == "emailtaken"){
						echo "<h2 style='color:red;'>Użytkownik o tym adresie email już istnieje.</h2>";
					}}?>
					<div class="form-group"> 
					<select class="form-control" name = "voivodeship" id="voivodeship">
						<option value="" disabled selected>Województwo...</option>
						<?php 
							$sql = "SELECT * FROM voivodeships;";
							$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_array($result)){ 
									?><option value="<?php echo $row["voivodeship_id"];?>"><?php echo $row["voivodeship"];?></option><?php
								}	
						?>
					</select></div>
					<div class="form-group">
						<select class="form-control" name = "city" id="city">
							<option value="" disabled selected>Najpierw wybierz województwo...</option>
							
							</select>
					</div></div>
					
    					<br><br>
					<!--- part 3 z ponizszymi ---><br><br> <h5 style="text-align: left"> Dane logowania </h5><br>
					<div class="form-group">
					<input class="form-control" type="text" placeholder="Nazwa Użytkownika..." name = "f_username" size="42"> </div>
					<?php   
					if(isset($_GET["error"])){ 
					if ($_GET["error"] == "invalidusername"){
						echo "<h2 style='color:red;'>Nazwa użytkownika musi liczyć od 5 do 20 znaków i składać się wyłącznie z liter oraz cyfr.</h2>";
					} 
					else if ($_GET["error"] == "usernametaken"){
						echo "<h2 style='color:red;'>Nazwa użytkownika zajęta.</h2>";
					}}?>
					<div class="form-group">
					<input class="form-control" type="password" placeholder="Hasło..." name = "f_password" size="42"> </div>
					<div class="form-group">
					<input class="form-control" type="password" placeholder="Potwierdź hasło..." name = "f_password_repeat" size="42"> </div>
					<?php   
					if(isset($_GET["error"])){ 
					if ($_GET["error"] == "invalidpassword"){
						echo "<h2 style='color:red;'>Długość hasła musi wynosić co najmniej 8 znaków.</h2>";
					} 
					else if ($_GET["error"] == "passwordsdontmatch"){
						echo "<h2 style='color:red;'>Hasła nie pasują do siebie.</h2>";
					}}?>
					<input class="form-control" type="date" name = "f_register_date" size="42" hidden> 
					<label><br>
      				<input type="checkbox" name="f_accept_rules"> Oświadczam, że przeczytałem i akceptuję <a href = "regulamin.php"> Regulamin Serwisu <br>
      					<br></a><?php   
					if(isset($_GET["error"])){ 
					if ($_GET["error"] == "rulesnotaccepted"){
						echo "<h2 style='color:red;'>Zaakceptuj Regulamin Serwisu.</h2>";
					} }?>
    				</label>
					<br> <br>
					<button class="btn btn-success" style="width: 50%;" type="submit" name="f_submit">Załóż konto!</button>
				</form> <br><br><br> 
				<?php 
					if(isset($_GET["error"])){ 
					if ($_GET["error"] == "stmtfailed"){
						echo "<script>alert('Coś poszło nie tak. Spróbuj ponownie.')</script>";
					} 
				}?>
				<p> <br><br><br> Powrót na stronę logowania? <a href="login.php">Wróć</a></p>
		</div></center>
		
	</main>
	<footer>
		<?php
						require_once "includes/footer.inc.php"; ?>
	</footer>
</div> </div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.js">  </script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/toggleDarkLight.js"></script>
</body>

</html>