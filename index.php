
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
	<title>Tender - darmowe ogłoszenia</title>
	<link rel="Stylesheet" type= "text/css" href = "css/bootstrap.min.css" />
	<link rel="Stylesheet" type= "text/css" href = "css/style.css" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="dark-theme || light-theme">
	<header>
		<?php
		require_once "includes/header.inc.php"; ?>
	</header>

	<main>
		<center>
			<div id = "container" style="width: 1000px;">
				<center> <h1> Zacznij tutaj<?php if (isset($_SESSION['userid'])) {
					$query = "SELECT * FROM users WHERE user_id = '".$_SESSION['userid']."'";
						$results = mysqli_query($conn, $query); 
						while($row = mysqli_fetch_array($results)) {
							echo ", " . $row['first_name'];}}?> </h1><br>
					<?php 
					require_once "includes/search.inc.php";?>

						<br><br><br><br>
						<h1 style="margin-left: 50px;">Przeglądaj kategorie</h1>
						<br><br>
						<section class="kategorie">
							<div class="row justify-content-center">

							<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<figure style="width:120px;"> 
										<a href="search.php?view=list&ctgr=1"><img style="width:60px;" src="img/ctgrs/motoryzacja.jpg" alt="motoryzacja" class="img-fluid"></a>
										<figcaption> <div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=1">Motoryzacja</a></h5>
										<div class="w3-dropdown-content w3-bar-block w3-card-4">
											<a href="search.php?view=list&subctgr=1" class="w3-bar-item w3-button">Części samochodowe</a>
											<a href="search.php?view=list&subctgr=2" class="w3-bar-item w3-button">Wyposażenie samochodu</a>
											<a href="search.php?view=list&subctgr=3" class="w3-bar-item w3-button">Do motocykla</a>
											<a href="search.php?view=list&subctgr=4" class="w3-bar-item w3-button">Opony i felgi</a>
											<a href="search.php?view=list&subctgr=5" class="w3-bar-item w3-button">Pozostałe</a></div></div></figcaption>
										</figure> 
								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=2"><img style="width:60px;" src="img/ctgrs/elektronika.jpg" alt="elektronika" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href=search.php?view=list&ctgr=2>Elektronika</a></h5>
											<div class="w3-dropdown-content w3-bar-block w3-card-4">
											<a href="search.php?view=list&subctgr=6" class="w3-bar-item w3-button">Telefony i akcesoria</a>
											<a href="search.php?view=list&subctgr=7" class="w3-bar-item w3-button">Sprzęt AGD</a>
											<a href="search.php?view=list&subctgr=8" class="w3-bar-item w3-button">Telewizory</a>
											<a href="search.php?view=list&subctgr=9" class="w3-bar-item w3-button">Komputery</a>
											<a href="search.php?view=list&subctgr=10" class="w3-bar-item w3-button">Konsole</a>
											<a href="search.php?view=list&subctgr=11" class="w3-bar-item w3-button">Sprzęt audio</a>
											<a href="search.php?view=list&subctgr=12" class="w3-bar-item w3-button">Fotografia</a></div></div></figcaption>
										<div id="electronics"></div>
									</figure>

								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=3"><img style="width:60px;" src="img/ctgrs/dom_i_ogrod.jpg" alt="dom_i_ogrod" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=3">Dom i ogród</a></h5>
											<div class="w3-dropdown-content w3-bar-block w3-card-4">
											<a href="search.php?view=list&subctgr=13" class="w3-bar-item w3-button">Meble</a>
											<a href="search.php?view=list&subctgr=14" class="w3-bar-item w3-button">Wyposażenie wnętrz</a>
											<a href="search.php?view=list&subctgr=15" class="w3-bar-item w3-button">Ogród</a>
											<a href="search.php?view=list&subctgr=16" class="w3-bar-item w3-button">Narzędzia</a>
											<a href="search.php?view=list&subctgr=17" class="w3-bar-item w3-button">Ocieplenie i budownictwo</a></div></div></figcaption>
									</figure>

								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=4"><img style="width:60px;" src="img/ctgrs/dla_dziecka.jpg" alt="dla_dziecka" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=4">Dla dziecka</a></h5>
											<div class="w3-dropdown-content w3-bar-block w3-card-4">
											<a href="search.php?view=list&subctgr=18" class="w3-bar-item w3-button">Odzież i obuwie</a>
											<a href="search.php?view=list&subctgr=19" class="w3-bar-item w3-button">Wózki i nosidełka</a>
											<a href="search.php?view=list&subctgr=20" class="w3-bar-item w3-button">Zabawki</a>
											<a href="search.php?view=list&subctgr=21" class="w3-bar-item w3-button">Akcesoria dla niemowląt</a>
											<a href="search.php?view=list&subctgr=22" class="w3-bar-item w3-button">Pozostałe</a></div></div></figcaption>
									</figure>

								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=5"><img style="width:60px;" src="img/ctgrs/zdrowie_i_uroda.jpg" alt="zdrowie_i_uroda" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=5">Zdrowie i uroda</a></h5>
											<div class="w3-dropdown-content w3-bar-block w3-card-4">
											<a href="search.php?view=list&subctgr=23" class="w3-bar-item w3-button">Leki bez recepty</a>
											<a href="search.php?view=list&subctgr=24" class="w3-bar-item w3-button">Suplementy diety</a>
											<a href="search.php?view=list&subctgr=25" class="w3-bar-item w3-button">Pielęgnacja ciała</a>
											<a href="search.php?view=list&subctgr=26" class="w3-bar-item w3-button">Kosmetyki i perfumy</a>
											<a href="search.php?view=list&subctgr=27" class="w3-bar-item w3-button">Urządzenia</a></div></div></figcaption>
											
									</figure>

								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=6"><img style="width:60px;" src="img/ctgrs/zwierzeta.jpg" alt="zwierzeta" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=6">Zwierzęta</a></h5>
										<div class="w3-dropdown-content w3-bar-block w3-card-4">
										<a href="search.php?view=list&subctgr=28" class="w3-bar-item w3-button">Psy</a>
										<a href="search.php?view=list&subctgr=29" class="w3-bar-item w3-button">Koty</a>
										<a href="search.php?view=list&subctgr=30" class="w3-bar-item w3-button">Ptaki</a>
										<a href="search.php?view=list&subctgr=31" class="w3-bar-item w3-button">Gryzonie i króliki</a>
										<a href="search.php?view=list&subctgr=32" class="w3-bar-item w3-button">Akwarystyka</a>
										<a href="search.php?view=list&subctgr=33" class="w3-bar-item w3-button">Akcesoria dla zwierząt</a></div></div></figcaption>
									</figure>

								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=7"><img style="width:60px;" src="img/ctgrs/moda.jpg" alt="moda" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=7">Moda</a></h5>
										<div class="w3-dropdown-content w3-bar-block w3-card-4">
										<a href="search.php?view=list&subctgr=34" class="w3-bar-item w3-button">Moda damska</a>
										<a href="search.php?view=list&subctgr=35" class="w3-bar-item w3-button">Moda męska</a>
										<a href="search.php?view=list&subctgr=36" class="w3-bar-item w3-button">Obuwie damskie</a>
										<a href="search.php?view=list&subctgr=37" class="w3-bar-item w3-button">Obuwie męskie</a>
										<a href="search.php?view=list&subctgr=38" class="w3-bar-item w3-button">Biżuteria i zegarki</a>
										<a href="search.php?view=list&subctgr=39" class="w3-bar-item w3-button">Galanteria i akcesoria</a>
										<a href="search.php?view=list&subctgr=40" class="w3-bar-item w3-button">Odzież robocza</a></div></div></figcaption>
									</figure>

								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=8"><img style="width:60px;" src="img/ctgrs/muzyka_i_rozrywka.jpg" alt="muzyka_i_rozrywka" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=8">Muzyka <br> i rozrywka</a></h5>
										<div class="w3-dropdown-content w3-bar-block w3-card-4">
										<a href="search.php?view=list&subctgr=41" class="w3-bar-item w3-button">Muzyka</a>
										<a href="search.php?view=list&subctgr=42" class="w3-bar-item w3-button">Instrumenty muzyczne</a>
										<a href="search.php?view=list&subctgr=43" class="w3-bar-item w3-button">Filmy</a>
										<a href="search.php?view=list&subctgr=44" class="w3-bar-item w3-button">Gry na PC i konsole</a>
										<a href="search.php?view=list&subctgr=45" class="w3-bar-item w3-button">Gry planszowe i towarzyskie</a>
										<a href="search.php?view=list&subctgr=46" class="w3-bar-item w3-button">Pozostałe hobby</a></div></div></figcaption>
									</figure>

								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=9"><img style="width:60px;" src="img/ctgrs/sport_i_turystyka.jpg" alt="sport_i_turystyka" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=9">Sport <br> i turystyka</a></h5>
										<div class="w3-dropdown-content w3-bar-block w3-card-4">
										<a href="search.php?view=list&subctgr=47" class="w3-bar-item w3-button">Rowery i hulajnogi</a>
										<a href="search.php?view=list&subctgr=48" class="w3-bar-item w3-button">Fitness i siłownia</a>
										<a href="search.php?view=list&subctgr=49" class="w3-bar-item w3-button">Sporty walki</a>
										<a href="search.php?view=list&subctgr=50" class="w3-bar-item w3-button">Piłka nożna</a>
										<a href="search.php?view=list&subctgr=51" class="w3-bar-item w3-button">Sporty zimowe</a>
										<a href="search.php?view=list&subctgr=52" class="w3-bar-item w3-button">Pozostały sport</a>
										<a href="search.php?view=list&subctgr=53" class="w3-bar-item w3-button">Wędkarstwo</a>
										<a href="search.php?view=list&subctgr=54" class="w3-bar-item w3-button">Turystyka</a></div></div></figcaption>
									</figure>

								</div>

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=10"><img style="width:60px;" src="img/ctgrs/kultura_i_edukacja.jpg" alt="kultura_i_edukacja" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=10">Kultura <br> i edukacja</a></h5>
										<div class="w3-dropdown-content w3-bar-block w3-card-4">
										<a href="search.php?view=list&subctgr=55" class="w3-bar-item w3-button">Literatura</a>
										<a href="search.php?view=list&subctgr=56" class="w3-bar-item w3-button">Czasopisma i komiksy</a>
										<a href="search.php?view=list&subctgr=57" class="w3-bar-item w3-button">Podręczniki</a>
										<a href="search.php?view=list&subctgr=58" class="w3-bar-item w3-button">Poradniki i kursy</a>
										<a href="search.php?view=list&subctgr=59" class="w3-bar-item w3-button">Języki obce</a></div></div></figcaption>
									</figure>

								</div>					

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=11"><img style="width:60px;" src="img/ctgrs/wydarzenia_i_okolicznosci.jpg" alt="wydarzenia_i_okolicznosci" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=11">Wydarzenia <br> i okoliczności</a></h5>
										<div class="w3-dropdown-content w3-bar-block w3-card-4">
										<a href="search.php?view=list&subctgr=60" class="w3-bar-item w3-button">Bilety</a>
										<a href="search.php?view=list&subctgr=61" class="w3-bar-item w3-button">Ślub i wesele</a>
										<a href="search.php?view=list&subctgr=62" class="w3-bar-item w3-button">Inne okoliczności</a></div></div></figcaption>
									</figure>

								</div>						

								<div class="col-8 col-sm-6 col-md-4 col-lg-3 col-xl-2">

									<figure style="width:120px;">
										<a href="search.php?view=list&ctgr=12"><img style="width:60px;" src="img/ctgrs/sztuka_i_kolekcje.jpg" alt="sztuka_i_kolekcje" class="img-fluid"></a>
										<figcaption><div class="w3-dropdown-hover" style="background-color: #EEFCFF;">
											<h5><a href="search.php?view=list&ctgr=12">Sztuka i kolekcje</a></h5>
										<div class="w3-dropdown-content w3-bar-block w3-card-4">
										<a href="search.php?view=list&subctgr=63" class="w3-bar-item w3-button">Dzieła sztuki</a>
										<a href="search.php?view=list&subctgr=64" class="w3-bar-item w3-button">Kolekcje</a>
										<a href="search.php?view=list&subctgr=65" class="w3-bar-item w3-button">Antyki i zabytki</a>
										<a href="search.php?view=list&subctgr=66" class="w3-bar-item w3-button">Rękodzieło</a></div></div></figcaption>
									</figure>

								</div>	
								<center>
								</div>
							</section>
							<br><br><br><br>
							<h1> Szukaj blisko siebie </h1>
							<br>
		
<form  method="GET" action="search.php">
	<input hidden name = "view" value = "list">
	<input hidden name = "voivodeship" id="voivodeship_id" value = ""> 

<div class="mapContainer">
    <svg class="map" id="map" baseprofile="tiny" fill="#7c7c7c" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" version="1.2" viewBox="0 0 1000 950" xmlns="http://www.w3.org/2000/svg">
    <path class="voivodship" d="M866.3 77.7l0.3 1.3-2.5 8.3-5.7 6-6.6 4.5-22.2 3.1-9.4 13.3 10.1 13.5 0.5 5.1 1.1 4.7 5 5 10.6 14.8-0.4 7.9-4 7.8-3.5 9.8-5.7 6.1-27.8 17.3-9.6 10.9-17.2 11.9-7.5 1.1-3.1 1.3-2.9 2.4-6.3 2.2-14.2-0.9-7.3 3.2-12 1-2.5 1.3-2.8 5.6-4.1 2.9-4.5 0.7-8.9-0.8-7.5 9-9 2.9-9.5 0-7.3 4.2-6.3 1.3-7.2-0.1-3.6 2.9-3.3 4-13.9 8.1-3.7 1-3.8-0.4-3.1 2.5-1.6 5.6-2.6 3-3 1.5-7.5 1.4-31.5-4.9-0.9-1-0.6-1.5-1.6-1.1-1.7-0.3-3.9 1.2-2.6 5.1-2.9 2.4-3.4 0.9-1.5-15.2-5.1-13-5.6-3.9-11.4-3-10.6-6.5-7.6-2.5-1.9-0.1-2.4-1-1.5-2.2-3-5.8-2.5-7.1-8.6-16.9 14.7-27.5 3.5-3.8 4.2-2.7 8 0.6 5.6-2.5 0.2-2.7 1.2-1.9 1.6-4.8 1.8-1.9 1.2-2.2 0-2.8 0.4-2.8-5-1.3-9.8 0.8-3.6-1.8 2-6.6-2.6-3.6-5.1-0.6-4.8-2.9-3.4-5.5-1.8-7.3-0.3-3.3 1.6-2.4 4.4-4.4 1.5-2.8 1.2-3.1-1.1-4.3-2-3.6-2.2-6.5 0.7-5.8 2.4-2.8 8.8 1.1 2.4-0.3-0.4 1.6-0.9 1.3-0.4 0.8-0.4 2.1 0 2.5 1.4-1.6 1.7-4.4 0.4-0.5 0.8-1 2.5-4.1 2.6-2.5 2-1 0.6-0.2 7.7-4.9 1.7-0.7 3.9-0.5 6.4-4.8 1.4-0.5 1.4-0.2 0.6-0.6 0.4-0.8 0.8-2.2 1-1 0.8-0.6-0.1-0.9-0.4-2.1 1.5-0.1 59.2 3.1 57.5 3.1 35.6 1.9 43.2 2.3 55.4 3 42 2.2 6.8-2.3 1.9-1.5 2.5-4.7z" id="28" name="28" onclick="chooseVoivodeship('28');colourVoivodeship('28');displayName('Warmińsko-mazurskie')">
    </path>
    <path class="voivodship" d="M524.8 99.1l0.4-1.6-2.4 0.3-8.8-1.1-2.4 2.8-0.7 5.8 2.2 6.5 2 3.6 1.1 4.3-1.2 3.1-1.5 2.8-4.4 4.4-1.6 2.4 0.3 3.3 1.8 7.3 3.4 5.5 4.8 2.9 5.1 0.6 2.6 3.6-2 6.6 3.6 1.8 9.8-0.8 5 1.3-0.4 2.8 0 2.8-1.2 2.2-1.8 1.9-1.6 4.8-1.2 1.9-0.2 2.7-5.6 2.5-8-0.6-4.2 2.7-3.5 3.8-14.7 27.5-5.4 2.4-11.4 0.7-5.4-2.2-3.1-2-6.5-6.8-1.7-1-1.3-1.6-2-1.2-8.1-1.1-5.7 2.1-3.7 2.4-8.5-5.1-17.9-3-3.3-3.1-2.9-3.7-3.5-0.4-16.9 2.6-12.7-2.5-2.7 2.1-4 7.5-6.9 2.5-3.2 3-0.5 2.2-0.4 2.4-0.1 3.6-6.2 2.5-13.8-3.7-3.7 0.4-2.7 3.9-2.5 5.3-3 10.5-2.8 1.7-4.4-5.3-5.3-2.9-20.3-0.8-5.8-3.6-4.1-7.3-4.8-5.9-1.8-18.3 4.2-4.2 3-5.3-1.2-3.6-1.7-2.8-2-1-0.1-3.3 5-2.4 5.5 0.8-1.9-4.1-2.3-3.3-2.8-2.5-3.7-7.6-2.4-2.9-4.3-3.1 0-9.3-0.8-9.4-6.3-19.3 13.9-3.4 1.6-2.5-0.4-4.2-1.9-2.7-1.1-2.4 0.7-3.1 2.7-2.7 1-4.6-0.7-8.2-3.1-6.3-8.2-11.9-7.1-14.4 7.4-2.9 4.2-0.8 3.8-1.3 9.5-10.5 30.1-14.2 37.7-7.1 16.9-5.8 26.6-2.5 16.4 0 2.2 0.8 3.6 3.2 1.4 0.7 2 0.5 34.1 20.4 6.2 8.1 1 1.9 1 2.7 0.1 2.3-1.8 0.8-1.5-3-1.8-1.3-1.2-3.3-1.7-2.1-4.7-8-0.9-0.5-3.5-0.7-0.9-0.4-1-1.6-2.8-1-5.9-4.1-5.9-2.8-0.9-1.3-3.3-2.5-0.8-0.4-1.2 0.5-0.7 0.9-1.4 4.9-0.2 1.2 0 2.5 0.6 0.6 2.4 1.1 1.7 2.8 1.4 3.1-0.4 2.5 0 1.1 1.2 1.3-0.6 3.3 1.1 1.5 1.9-0.4 1.7-2.2-0.6 2.9 0.8 2.3 1.2 1.9 2.6 7.8 0.7 1.7-0.4 3.9 0.1 6.8 0.7 6.4 1.4 2.9 1.5 0.5 3.1 2.3 1.5 0.6 1.4 0.1 1.6 0.5 1.5 1 0.6 1.5 1.6 2.3 16.8 5.5 3.7 0.2 3.2-1.7 0.8 0.9 1.2 0.6 2.7 0.9 37.4-5.6 8.2-4 3.9-1 3.2-1.4 6.1-6.4 1.7-0.8 1.1 0.9-17.7 13.7-4.3 2.2-4.2 1.2-8.7 0.8-4.1 1.6 0 1 2.3 3.1 1.1 0.6-1.1 1-0.3 2.4 2.5 1.5 8.8 1.1 2.4-0.3 0 1.3-0.4 0.3z" id="22" name="22" onclick="chooseVoivodeship('22');colourVoivodeship('22');displayName('Pomorskie')">
    </path>
    <path class="voivodship" d="M224.8 516.3l8.7-1.6 4.1 1 11.2 6.2 1.8 4 0.3 5.2 4.3 7.7 9.7 5.4 5.4 6 11.5 4.1 20.6-3.6 3.7-8.6 4.2-0.9 11.7 0.1 11 3 9.9 6.4-1 4.6-1.3 4-2.5 1.6-1.3 3.4 0.6 6.9 2.3 5.9 5.9 1.4 6.1-1.3 3.8 1.1 3.5 2.9-2.8 6.7 1.2 16.3 1.3 7.9-3.3 2.1-3.5 0.8-3.4-0.2-3.3 1.1-2.6 2.8-5.8 13.3-1 3.9-0.6 4.1-1.6 4.8-3.2 2.1-4.7 6.2-3.6 8.3-8.3 12.3-7.2 13.7-2.3 8.8-3.5 6.2-6.1 1-5.2 4-7.2 17.9-0.4 1.9-2.8-1.7-2.3-0.3-2.7 1.7 0 2.1 3.2 4.8 1.1 2.8 0.8 3.3 1 3.1 1.8 1.9 2.5 1.4 1.8 2 1 2.8 0.2 3.8 1.3 1.7 0.2 2.1-0.7 1.3-1.2-0.4-1.5-2.6-0.6-0.4-1.5 0-0.2 0.4 0 1.9-1.2 0.6-1.8-0.6-0.9 0-1.2 0.8-1.6 2.3-1 0.9-2.3 0.6-2-0.2-2 0.3-2.2 1.9-1.8 2.8-1.1 2.1-1.2 1.7-2.2 1.6-3.1 4.2-4 0.3-4.2-2.2-3.4-3.1-1.8-2.3-0.9-2-1.2-5.3-1-2.9-3-3.2-1.3-2.3-1.5-2-2.5-4.6-1.4-2-2.2-1.6-4.5-1.6-1.7-2.4-0.3-1.3 0-2.9-0.7-1.4-0.9-0.3-4.6 0-2.6 1.1-1.3-1-0.4-0.9-1.3-4-3.2-0.6-1-2.8 0.8-2.5 2 0.5-0.7-2.3 2.1-0.8 1.5-1.3 1.8-1.1 1.5-1.2 0.7-2.1 1.6-0.5 3.2 0.9 1.7-0.4 0.9-1.3 2.1-2 0.6-1.1 0.2-2.9 0.7-1.4-0.3-1.7 3.1-1.3-0.9-3-8.5-9-3.1-1.7-3.2-0.9-3.6 0-1.3 0.2-1.5 3.6-1.2 1.6-1.6 0.3-1.6-0.7-3.1-2.4-4.2-0.4-6.2 6-4.2 0.8-0.3-1 0.3-1 1.4-1.2 0.2-1.9-0.5-2.1-0.9-2.2-1.3-2.4-1.3-1.3-1.7-0.3-5.9 2.3-2.7 0-0.7-0.2-5-8.6-0.5-2-2.5-0.2-8.3 2-1-0.4-0.7-0.7-1.4-2-1.1-0.8-19.9-7-4.2 0.4-0.9 1.1-1 1.7-1.1 1.2-1.4-0.5-0.6-1.3 0.4-3.1-0.1-1.5-1.2-2.9-1.5-1.3-1.8-0.8-2-1.6-1-1.7-1.2-2.6-0.9-2.8-0.3-2.3 0.7-2.9 0.8-1.6 0.1-1.6-1.6-2.5-2.6-1.4-5.7-0.1-0.9-2.3-0.5-2.4-1.1-0.6-1.3 0.9-0.9 2.1-0.4 1.6-1.1 0.3-1.4-0.7-1.2-1.2-0.8-1.6-5-1.1-1.9-1.7-0.8 2-1.4 1.1-1.2 0.4-0.9 0.9 0.4 1.8 1.6 1.3 1.5 2.2 0.1 4.6-1.2 1.9-0.4 1.4 0.2 1.1 0.1 5.5-0.2 1.3-11.4-0.8-3.6 1-2.1-0.1 0-2.9 1.4-2.3 3.5-4 5.1-12 4.4-11.3 0.3-1.8 0-3.1 0.2-1.5 0.5-1.1 1.5-1.8 0.2-2.1 0.1-4 0.8-4.4 1.4-4.3 1.7-3.3-0.8-1 0.5-4.6-1.4-3.1-2.3-2.7-1.8-3.2-0.8-4.1-0.6-6.8 1.9-1.1 16-8.4 2.8 0 5.9 5.1 2.9 0.2 5-8.7 3.3-4 7.3-2.5 14 7.7 7.1-1.7 11-14.6 9.8-19.2 2.2-1.6 3.5-1.2 3-3 1.4-4.2 2-2.7 15.1 2.8 2.6 2.9 0.4 5.6 5.5 7.1 7.9-1.8 6.1-5.3 4.8-8z" id="2" name="2" onclick="chooseVoivodeship('2');colourVoivodeship('2');displayName('Dolnośląskie')">
    </path>
    <path class="voivodship" d="M282.3 214.1l-3.8-1.2-3.8 0.1-3.5 1.6-2.6 4.6-2 5.5-2.5 10.7-3 0.5-18.3-0.4-2.3 3.2 0.1 6.6 1.6 6 6.2 6.1 7.5 1.9 3.7 1.9 3.1 4 0.7 4.8-3.1 3.8-2.3 4.2-2.9 2.7-7.4 2.3-14.4 8.5-8 12.7-9.7 9.1-6.1 2.4-6.2 0.8-6.1-3.6-5.5-1.9 1.8-7.8-2.6-8.2-5-1.1-5.4 0.8-5.2 4.1-9 11.5-5 3.7-20.5-0.1-16.9 5.8-5.7 0.3 2 2.7 2.7 0.5-3.7 7.2-6.2 7.1-5.2 0.8-16.6-5.5-9.7 5.4-6.4 13.9-7.8 11-5 2.1-8.5 1.4-2.1 3.3-2.5 8.8-5.8-6.6-5.9-2.3-2.9-4-1.9-0.9-1-1-3.4-6.7-1.6-1.8-10.6-7.9-2.7-1.4-3.2-3.9-2-0.9-2.2-0.1-2.1-0.7-1.8-1.4-1.1-2.3 2.6-2.3 1.1-2 0.4-3.1-0.2-2.1-1.3-5.8-0.6-1.7 0-1 4.9-3.6 6-3.2 5.9-4.7 3.1-3.2 1.3-3 0.3-1.4 3-9.4-0.2-2.4-0.6-2.4-0.4-2.7 0.3-2.2 0.7-2 1-1.5 1-0.6 0.8-1 2.5-5.2-1.3-1.2-0.3-0.9-1.6-1.3-0.6-1.1-0.3-1.6-0.2-4.4-2.8-12.9-1-8.7-2.1-3.5-1-3.5-2.4-3.8-0.8-3.4 0-3.7 0.2-6.2-0.2-1.6-2-6.6-1.5-3.3 0.4-2.6-0.2-4.7 1-0.1 1.8-0.8 1.3-1.2 0.2-1.4-1.8-1.2 1-0.6 0-1.2-1-0.5 0.6-1.3 0.9 0.9 2.7 1.6 1.1 3.3 1.4 1.1 2.8 1.3 2 2.1 1.1 0.9 4.3 0.8 5.4 1.9 1.8 1.5 1.6 2.2 3.2 6.3 1.2 1.5 0.5-0.5 0.1-2.7 0.5-1.6 0.8-1 1.4-1.1 0-2.3-1.1-0.3-2.5-0.2-1.2-0.6-3.1-7.5 0.7-3.7 2.4-7.3 1.2 1 2-1 1.6 0-0.7-4.3 0.4-3.4 0.6-3 0.4-3.2-0.7 0-0.3 2-0.7 1.4-2.4 2.4-1 0.3-1.1-1.5 2.1-2.3-1.4-2.8-2.4-1.4-11-1.1-1.6-1.8 1.3-3.3-0.6-1.1-1 1.7-0.8 0.2-2-0.8-0.9 0.4-2.2 3 3 0.6 1.6 0.7 0.9 1.1-0.2 2.1-1.1 1.5-1.2 0.5-0.9-0.6-2.8 1.7-2.7 0.6 0 1.1 1.3 0.6-1.3 0.6-1-0.1-1.6-0.9-1.1-0.2-1.7-1.1-4.8-6.9-2.5-1.1-0.8-2.6-1.8-2.2 1.8-0.8 1.7-4.6 1.6 0.8 1.1 0.9 3.1 1.1 9.8 0.9 4-0.9 3.8-2 7.2-5.3 26.3-11.8 22.8-6 27.7-11.7 17.9-4.8 19.7-5.3 19.3-8.8 16-2 11.1-3.7-1.3 1.2-4.9 2.3 2.1 1.5 8.8-1.5-0.7-1.1 0-1.3 4.8 0-0.7-1.1 0.2-2.8-2.3-0.1-5.4 1.7 3.4-1.7 4.1-2.7 6.2-7.3-1.2 2.6-2.3 2.3 0.1 1 1.8-0.4 1.6-0.7 1.3-1.6 3.5-1.7 1.3-1.5-1.2-2.5-1.9 0-2.4 2.5 4.2-7.3 11.6-14.9 0 1.1-0.6 1.6 1 0.5 1.7-0.6 1.2-1.5 0.7-2.3-0.6-0.7-1.3 0.5-1.5 1.4 2-4.1 3.5-3.5 6.8-4.2 20.8-3.1 0.7-0.3 7.1 14.4 8.2 11.9 3.1 6.3 0.7 8.2-1 4.6-2.7 2.7-0.7 3.1 1.1 2.4 1.9 2.7 0.4 4.2-1.6 2.5-13.9 3.4 6.3 19.3 0.8 9.4 0 9.3 4.3 3.1 2.4 2.9 3.7 7.6 2.8 2.5 2.3 3.3 1.9 4.1-5.5-0.8-5 2.4 0.1 3.3 2 1 1.7 2.8 1.2 3.6-3 5.3-4.2 4.2 1.8 18.3z" id="32" name="32" onclick="chooseVoivodeship('32');colourVoivodeship('32');displayName('Zachodniopomorskie')">
    </path>
    <path class="voivodship" d="M191.7 311l-2 9.6 0.4 10.5-9.7 12.5 3 2.8 2.2 8.2-1 2.5-1.9 1.3-9.4 3-1.6-0.2-0.7 1.5-0.1 3.7-0.4 3.5 0.4 9.2 3.5 9.7 1.2 5.7 0.8 6 0 4.9-2.7 0-2.1 1.5 4.2 7.5 2 4.8 0.2 10.1-3.2 9.5-0.5 2.4-0.2 2.5-1.2 4.8 0 5.4 0.7 5.1 2.4 3.5 2.7 2.8 5.5 3 1.8 5 2.3 4.2 3.5 3.6 3.7 0.1 1.7-0.8 1.7 1.1 0.1 3.2-0.9 3.1-0.4 5.6 1.4 4.3 4.3 2.9 4.5 1.5 7.3-4.9 6.5 7.1 3.1 12-4.8 8-6.1 5.3-7.9 1.8-5.5-7.1-0.4-5.6-2.6-2.9-15.1-2.8-2 2.7-1.4 4.2-3 3-3.5 1.2-2.2 1.6-9.8 19.2-11 14.6-7.1 1.7-14-7.7-7.3 2.5-3.3 4-5 8.7-2.9-0.2-5.9-5.1-2.8 0-16 8.4-1.9 1.1-0.3-4.2 0.8-2-1-2.2-1.9-2-1.5-1.2-2.3-1.1-4.6-1.4-2.3-1.3-2.1-1.5-6.5-2.2-2.2-2.3-0.6-2.8 0.8-3.2 2-3 1.2-3.2-0.2-4.3-1-4.1-1.3-2.7-4.8-4.1-2.3-2.6-1-4.1-0.4-4.3-1.4-1.8-1.8-1.3-1.6-2.5-0.3-3.4 1.3-2.8 5.7-5.8 1.9-2.5 1.5-2.9 0.8-3.2 0.4-9.8 0.5-1.6 2.2-3.9 0.4-1.6 0.5-2.9 0.8-1.4 1.8-2.3-6.5-4.8-1-2.4 0.6-4.2 1.1-2.9 0.4-2.4-1.5-2.2 0-1 2-2.6 0-3.3-1.5-2.9-2.8-1.2-2.8-0.7-3.4-1.7-2.3-2.5 0.6-3-2-4.7-2.4-7.2-0.6-6.5 5.2-4.5 2.4-3.9 1.6-3.8-0.4-1.7-1.9-1.8 0.8-3.8 2.8-5.8-3.1-2.6-0.6-0.6 2.5-8.8 2.1-3.3 8.5-1.4 5-2.1 7.8-11 6.4-13.9 9.7-5.4 16.6 5.5 5.2-0.8 6.2-7.1 3.7-7.2-2.7-0.5-2-2.7 5.7-0.3 16.9-5.8 20.5 0.1 5-3.7 9-11.5 5.2-4.1 5.4-0.8 5 1.1 2.6 8.2-1.8 7.8z" id="8" name="8" onclick="chooseVoivodeship('8');colourVoivodeship('8');displayName('Lubuskie')">
    </path>
    <path class="voivodship" d="M282.3 214.1l4.8 5.9 4.1 7.3 5.8 3.6 20.3 0.8 5.3 2.9 4.4 5.3-2.7 6.2-7.2 9.5 1.2 5 8.4 6.6 4.8 10.8-9.1 7.7 0.9 7.1 3.1 5.9-1.4 10.3-4.5 10.4 8.1 2.9 7.5 5.7 4.9 10.8-2.1 11.6-1.2 2.3-1.6 0.6-1.8-0.1-1.7 1.2-0.6 4.3 3.6 3.4 1.5 3.9 2 3.2 4 0.8 4-1.4 1.8-1.6 3.1 2.7 0.9 2.2 0.4 2.7 0.8 1 1.1 0.6 6.4 2.2 6.9 0.4 7.5 4.1 10.2 9.3 3.5 1.9 3.7 0.2 3.4 1.4 2.9 3.6 3.2 3.1 10.1 2.6 3.4-1.5 5.8-6.8 1.9 0.5 1.4 1 0.8 3 1.2 2.6 1.9 2.8 2.4 0.8 1.5-0.9 1-1.8 1.8-0.8 1.9-0.2 3.5 1.6 3 3.6 16.5 13.5 2.7 6.2 3.6-0.3 10.4-4.4 3.5-0.5 9.5 7.2 0.2 5.3 1.9 4.1 1.5 0.4 0.2 1.6-6.1 5.9-10 4.3-1 4.5-0.9 10.2-5.1 5.9-6.6 1.6-3.5-0.4-3.1 0.3-1.4 5-0.7 5.5 1.1 5.7 1.9 5.2-0.4 5.1-4.8 8.4-1.1 1.3-14.5-1.6-5.7 2.7-2.5 3.5-4.7 11.1-2.5 9.8-0.5 10.6 1 8.8 0.1 8.5-2.8 7.6-4.7 3.4-5.4-2.7-5 1.6-1.7 5-2.5 3.9-7.2 1.7-1.6 3.5 0.2 5.2 1.9 4.4 5.7 5.1 1 4.3 0.6 7.5-11.3 6.8-11.8 4.3-6.4-0.3-5.2-4.3-0.6-3.8-1.3-3.5-3.3-1.7-3.4 0.2-1.3-7.9-1.2-16.3 2.8-6.7-3.5-2.9-3.8-1.1-6.1 1.3-5.9-1.4-2.3-5.9-0.6-6.9 1.3-3.4 2.5-1.6 1.3-4 1-4.6-9.9-6.4-11-3-11.7-0.1-4.2 0.9-3.7 8.6-20.6 3.6-11.5-4.1-5.4-6-9.7-5.4-4.3-7.7-0.3-5.2-1.8-4-11.2-6.2-4.1-1-8.7 1.6-3.1-12-6.5-7.1-7.3 4.9-4.5-1.5-4.3-2.9-1.4-4.3 0.4-5.6 0.9-3.1-0.1-3.2-1.7-1.1-1.7 0.8-3.7-0.1-3.5-3.6-2.3-4.2-1.8-5-5.5-3-2.7-2.8-2.4-3.5-0.7-5.1 0-5.4 1.2-4.8 0.2-2.5 0.5-2.4 3.2-9.5-0.2-10.1-2-4.8-4.2-7.5 2.1-1.5 2.7 0 0-4.9-0.8-6-1.2-5.7-3.5-9.7-0.4-9.2 0.4-3.5 0.1-3.7 0.7-1.5 1.6 0.2 9.4-3 1.9-1.3 1-2.5-2.2-8.2-3-2.8 9.7-12.5-0.4-10.5 2-9.6 5.5 1.9 6.1 3.6 6.2-0.8 6.1-2.4 9.7-9.1 8-12.7 14.4-8.5 7.4-2.3 2.9-2.7 2.3-4.2 3.1-3.8-0.7-4.8-3.1-4-3.7-1.9-7.5-1.9-6.2-6.1-1.6-6-0.1-6.6 2.3-3.2 18.3 0.4 3-0.5 2.5-10.7 2-5.5 2.6-4.6 3.5-1.6 3.8-0.1 3.8 1.2z" id="30" name="30" onclick="chooseVoivodeship('30');colourVoivodeship('30');displayName('Wielkopolskie')">
    </path>
    <path class="voivodship" d="M499.5 219.5l8.6 16.9 2.5 7.1 3 5.8 1.5 2.2 2.4 1 1.9 0.1 7.6 2.5 10.6 6.5 11.4 3 5.6 3.9 5.1 13 1.5 15.2-4.8 3.9-5.1 2.4 0.6 3.1 0.1 3.3 0.8 4.9-0.3 3.2-0.5 3.3-1 2.8-1.9-0.3-1.8-1.3-1.9-0.8-2.2 2.1-1.8 2.8-4.2 3.5-4.8-0.6 1.5 6.7-0.5 6.1-2 2.2-0.8 3.4 1.1 3.4 1.6 3.1 2.9 7 0.1 5.4-4.3 1.2-6.7 19.5-2.6 5.4-0.6 6.3 2.1 2.1 0.4 3-7.4 12.2-0.4 2.8-0.6 2.8-2-0.1-1.9 0.3-1.2 1.9-0.9 1.8-3.8 1.2-12.3 0.2-1.7 1-0.7 1.5-1 1.2-9.5-7.2-3.5 0.5-10.4 4.4-3.6 0.3-2.7-6.2-16.5-13.5-3-3.6-3.5-1.6-1.9 0.2-1.8 0.8-1 1.8-1.5 0.9-2.4-0.8-1.9-2.8-1.2-2.6-0.8-3-1.4-1-1.9-0.5-5.8 6.8-3.4 1.5-10.1-2.6-3.2-3.1-2.9-3.6-3.4-1.4-3.7-0.2-3.5-1.9-10.2-9.3-7.5-4.1-6.9-0.4-6.4-2.2-1.1-0.6-0.8-1-0.4-2.7-0.9-2.2-3.1-2.7-1.8 1.6-4 1.4-4-0.8-2-3.2-1.5-3.9-3.6-3.4 0.6-4.3 1.7-1.2 1.8 0.1 1.6-0.6 1.2-2.3 2.1-11.6-4.9-10.8-7.5-5.7-8.1-2.9 4.5-10.4 1.4-10.3-3.1-5.9-0.9-7.1 9.1-7.7-4.8-10.8-8.4-6.6-1.2-5 7.2-9.5 2.7-6.2 2.8-1.7 3-10.5 2.5-5.3 2.7-3.9 3.7-0.4 13.8 3.7 6.2-2.5 0.1-3.6 0.4-2.4 0.5-2.2 3.2-3 6.9-2.5 4-7.5 2.7-2.1 12.7 2.5 16.9-2.6 3.5 0.4 2.9 3.7 3.3 3.1 17.9 3 8.5 5.1 3.7-2.4 5.7-2.1 8.1 1.1 2 1.2 1.3 1.6 1.7 1 6.5 6.8 3.1 2 5.4 2.2 11.4-0.7 5.4-2.4z" id="4" name="4" onclick="chooseVoivodeship('4');colourVoivodeship('4');displayName('Kujawsko-pomorskie')">
    </path>
    <path class="voivodship" d="M561.5 666.9l8.5 1.6 1.2 0.7 0.4 1.8 0 1.9-0.5 1.3-6.8 1.1-3.7 7.1 2.7 3.3 7.5 2.1 3.5 2.7 2.7 6.2 4.8 5.8-4 0.6-6.9 5.8-2 4.3 3.5 1.8 6.8 1 2.8 1.1 0.6 3.4 0.3 2.8-12.6 8-3.2 0.5-5.5-0.5-5.5 0.9-8.8 6.8-2.6 0.6-2.5 0-5.5-3.2-2.7 4-2.8 5.6-4.3 6.2-6.7-0.9-3.1 2.4 5.3 5.3 4.6 6.4-23.6 26.6-2.2 3.3-2.2 4.5-1.1 5.2 2 2.6 2.6 0.3 2.2 2.7 0.2 5.2 3 5.3 5 2 2.1 3.7 1.5 4.8 3.2 3 3.7 1.7 6.8 1.2-0.4 4-1.7 3.5-0.8 3.2 1.2 2.8 2.4 1.6 0.5 1.7-1.1 0.1-0.4 0.7-8.6 9.6-0.8 0.6-2.4 0.8-3.1-0.1-1.9 0.5-1.6 0.8-1.5 1.3-1.3 2.2-1.6 5 0.7 1.4-0.7 1.3-1.5 0.1-0.7 3-0.3 1.9-0.7 1.2-3.1 1.3-2.5 0.5-1-0.1-3-1.9-0.9-0.4-2.1 0.6-3.9 2.2-2.5 0.2-2-0.4-0.5-1.7 0.4-5-0.3-2.3-0.4-2.1-0.1-2.2 0.8-2.5-2.9-1.8-9.8-0.9 0.4-2.6-0.3-3.2-1.4-6.5-1.6-4.1-0.5-1.5-0.7-5.3-0.4-1.2-1.5-1.1-1.5 0.3-1.6 0.7-1.4 0.1-1.3-0.8-1.9-2.3-1.3-1-1.5-0.5-3-0.2-1.4-1-0.6-1.1-1-4.5-2.3-4.9-1.8-4.7 0-4.1 2.7-3.2-2.6-1.4-0.4-1.9 0.2-2.4-0.6-2.8-1.5-0.9-3.9 2.5-2.3 0-7.4-4.1-3.9-1.3-3.6 0.5 0.3 0.5-2.8 2.4-1.5 0.3-2-1.6-0.5-1.1-1.1-3.2-1.2-0.9-2.3-0.5-1.2-0.5-3.2-2.7-1.5-0.9-6.3-1.2-1.3-1.5 0.6-2.8-5.8-3.9-1.4-0.3 0.1-2.6 6-11.6 12.5-2.7 6-4.5 9.6-4.5 1.1-4.6 0.1-7.9-1.7-20.1 0.9-3.2 2.1-0.4 2.2-1 0.2-2.9-1.1-2.7 1.3-3.5 3-0.7 14.4 0.1-1.1-5.7-3.2-3.4-3.2-2.5-2.7-3.6-1.9-5.9 2.4-6.5 1.8-9.8 2.6-5.6 7.8-5.1 0.7-5.6-1.3-2.9-0.6-3.6 0.7-2.4 1.3-1.5 3.4-12.2 5-2.4 14.1-0.5 3.2-1.5 3.2-2.2 3.5 0.7 3 3.1 13.1 7 6.4 1.4 8-0.1 3.4-3 6.7 1.3 6 5.5 9.3 14.9 3.4 1 9.9-0.5 10.9 5.5z" id="24" name="24" onclick="chooseVoivodeship('24');colourVoivodeship('24');displayName('Śląskie')">
    </path>
    <path class="voivodship" d="M516.2 421.6l9.6 6.6 10.5 2.2 5.1 2.4 9.2 7.5 20.7-4.3 3.2-3.3 3.7-0.3 2.7 3.5 2.4 4.1 3.1 1.7 3.5 1 2.8 1.9 1.2 4.2 0.4 5.7 2 4.5 1.4 0.8 1.6-0.4 6.8 2.8 3.9 2.6 1.4 1.7-1.1 8.1-3.3 2 0.8 3.4 2.7 3.1 2.4 3.6-0.3 3 0.9 2.6 3.6 1.2 10.6-1.2 6.6 3 7.2 5.6 5.9 7.9 0.6 2.6-0.9 1.9-1 1.5-0.5 2 0.9 4.6 5.4 5.6 1.5 4.1-0.3 3.8-1.2 2.7-7.3-1-5.9-3.3-7.8 0-2.6 9.1 3 7.1 0.9 4.9 0.4 5.1 0.8 2.6 3.6 1.8 1.3 1.4 0 5.2-1.6 4.4-6.4 6-1.3 4.3 0.3 4.7-2.8 2.1-3.7 9.1-3.3 1.5-3.3 0.5-3.2 1.6-6.9 6.6-3.2 0.9-11-1.6-3.1 1.2-2.4 3.2-2.5 9.6 4.5 6.9 3.1 2.5 1 5.3-0.8 5.1-2.3 2.7-13.1-9.6-3.5 0.6-1.3 5.1-0.1 5.1 0.4 4.9-1.7 4.8-3.4 2.3-2.9 2.7-2.3 3.9-10.9-5.5-9.9 0.5-3.4-1-9.3-14.9-6-5.5-6.7-1.3-3.4 3-8 0.1-6.4-1.4-13.1-7-3-3.1-3.5-0.7-3.2 2.2-3.2 1.5-14.1 0.5-5 2.4-7.5-6-2.3-4.6-2.7-3.2-1.2 0.6-0.9 1.7-1.3 1.1-7 0.2-22.3-5.7-2.9-2.4-2.3-4-0.6-7.5-1-4.3-5.7-5.1-1.9-4.4-0.2-5.2 1.6-3.5 7.2-1.7 2.5-3.9 1.7-5 5-1.6 5.4 2.7 4.7-3.4 2.8-7.6-0.1-8.5-1-8.8 0.5-10.6 2.5-9.8 4.7-11.1 2.5-3.5 5.7-2.7 14.5 1.6 1.1-1.3 4.8-8.4 0.4-5.1-1.9-5.2-1.1-5.7 0.7-5.5 1.4-5 3.1-0.3 3.5 0.4 6.6-1.6 5.1-5.9 0.9-10.2 1-4.5 10-4.3 6.1-5.9-0.2-1.6-1.5-0.4-1.9-4.1-0.2-5.3 1-1.2 0.7-1.5 1.7-1 12.3-0.2 3.8-1.2 0.9-1.8 1.2-1.9 1.9-0.3 2 0.1z" id="10" name="10" onclick="chooseVoivodeship('10');colourVoivodeship('10');displayName('Łódzkie')">
    </path>
    <path class="voivodship" d="M893.8 428.4l-3.2 6-9.5 14-2.8 6.7-3.3 4.2-3.9 1.5-11.7-6.1-4-0.9-1.8 1.2-1.7 1.8-0.6 2-0.5 2.4-5.5 4.6-11-1.1-3.8 0.5-9.5 7.1-3.5 1.1-5.1-0.9-13.6 2.7-14.4-0.1-7.6 2.2-7.1 5.3 0.6 4.1 1.6 4.5 2 4.2 0.4 4.3 2.4 6 3.5 5.3-5.5 3.4-3.8 5.4 5 7.7-0.6 3.7-2.5 2.4-7.1 2.5-7.2-1.2-3.6-1.4-3.6 0.9-1 4.1 0.1 1.7 1.3 2.1 1.4 1.8 2.8 1.3 5.1 1 1.8-0.1 2.4-1.1 1 0.1 1.5 1 0.4 1.4-0.1 1.9 0.2 2.2 1.8 2.8 0.3 2-1.5 1.8 0 1.1 3.1 0.3-0.1 6.5-2.4 3.4-2.4 1.9-0.2 3.9 4 4.8-0.6 4.5-1.2 4.9 0.2 3.3-1.1 0.2-0.9 0.8-1.3 2.5-1.8 9.9-1.2 3.7-0.1 1.8 0.2 1.3 0.9 2.8 0.8 5.1 2.4 6.1-31.8 6.7-16.5-5.2-7.7-0.7-6.8-4.4-0.6-2.4-0.4-2.7-3-3.3-0.9-5.4-3-1-3.1 3-2.9 4-3.3 1.9-13.9 2.2-12-2.5-2.6-1.9-2.1-3.4-2.3-2.6-16.4-10.1-3-7.5-5.5-2-0.3-4.7 1.3-4.3 6.4-6 1.6-4.4 0-5.2-1.3-1.4-3.6-1.8-0.8-2.6-0.4-5.1-0.9-4.9-3-7.1 2.6-9.1 7.8 0 5.9 3.3 7.3 1 1.2-2.7 0.3-3.8-1.5-4.1-5.4-5.6-0.9-4.6 0.5-2 1-1.5 0.9-1.9-0.6-2.6-5.9-7.9-7.2-5.6-6.6-3-10.6 1.2-3.6-1.2-0.9-2.6 0.3-3-2.4-3.6-2.7-3.1-0.8-3.4 3.3-2 1.1-8.1-1.4-1.7-3.9-2.6-6.8-2.8-1.6 0.4-1.4-0.8-2-4.5-0.4-5.7-1.2-4.2-2.8-1.9-3.5-1-3.1-1.7-2.4-4.1-2.7-3.5-3.7 0.3-3.2 3.3-20.7 4.3-9.2-7.5-5.1-2.4-10.5-2.2-9.6-6.6 0.6-2.8 0.4-2.8 7.4-12.2-0.4-3-2.1-2.1 0.6-6.3 2.6-5.4 6.7-19.5 4.3-1.2-0.1-5.4-2.9-7-1.6-3.1-1.1-3.4 0.8-3.4 2-2.2 0.5-6.1-1.5-6.7 4.8 0.6 4.2-3.5 1.8-2.8 2.2-2.1 1.9 0.8 1.8 1.3 1.9 0.3 1-2.8 0.5-3.3 0.3-3.2-0.8-4.9-0.1-3.3-0.6-3.1 5.1-2.4 4.8-3.9 3.4-0.9 2.9-2.4 2.6-5.1 3.9-1.2 1.7 0.3 1.6 1.1 0.6 1.5 0.9 1 31.5 4.9 7.5-1.4 3-1.5 2.6-3 1.6-5.6 3.1-2.5 3.8 0.4 3.7-1 13.9-8.1 3.3-4 3.6-2.9 7.2 0.1 6.3-1.3 7.3-4.2 9.5 0 9-2.9 7.5-9 8.9 0.8 4.5-0.7 4.1-2.9 2.8-5.6 2.5-1.3 12-1 1.3 5.8 2.3 5.4 1.6 6.6 2.5 19.2 5.6 14 3.6 7.1 5.3 2.8 5.5 0.8 4.6 3.6-1.7 3 0.5 4.2 2.5 4.5 3.8 2.1 2.4 2.6 1.5 4.1 1.4 6 2.6 4.9 7.1 3.7 7.6-1.2 4.9-5.4 4.8 3.7-1.5 9.1 2.5 3.5 3.1 2.2 5.6-2.8 5.8-1.6 1.5 7.7 0.6 8.6 1.2 5.8 0.4 6.1-0.3 3.6 5.5 5.9 2.1 2.9 2.2 1.9 0.7 1 0.2 1.6-0.7 2.6-0.1 1.5 0.3 2.1 0.5 1.3 0.8 0.8 1.4 0.2 0.3 0.8-0.6 5.4 0.7 1.8 1.7 2.4 2 1.5 1.7-0.7 1.2 1.9 2.4 0.6 5.3-0.3 15.5 3.2 7.7-1.1 3 1 2.2 2.2 1 3.7 2.1-1.1 1.8 1.1 2.8 3.4-0.5 0.8-0.8 2.5 1.7 1 1.6-0.5 1.5-1z" id="14" name="14" onclick="chooseVoivodeship('14');colourVoivodeship('14');displayName('Mazowieckie')">
    </path>
    <path class="voivodship" d="M767.1 627.2l0.4 2.2-1.2 1.6-1.5 0.5 0 1.1 1.8 1.4 0.3 3.1-0.7 6.8-0.7 1.3 0.1 1.9 1 0.7 0.4 2 2.5 9.7 0.5 3.4 0.3 2.1 0.1 5.8-0.8 6.2-0.7 2.5-1.2 2.8-1.5 2.4-1.8 0.9-2.6 0.4-1.7 1.3-2.8 4.8-4.8 5.6-0.7 2.4-0.5 3.1-1.2 2.4-3.1 3.7-1.8 1.6-6.4 1.6-9.5 4.3 1.3 3.2-1.9 2-2.5 1.5-2.5 0.5-1.9-0.8-6.1 5.3-0.4 0.2-1.8 0.2 0.1 1.9-1.2 0.8-0.6 0-1-0.8-0.5 2.2-1.2 1.1-1.1 0.6-0.6 0.8-0.1 1.3-1.6 0.9-1.7 2.4-1.8 0.7-1.9-2.1-1.4-0.5-1 0.2-4.1 2-3 2.8-1.5 0.4-7.4 0.2-1 0.4-1.8 2-1 0.6-2.7 0.2-1.3 0.9-1.6-1-1.3 0.9-1.4 1.4-1.6 0.8-3.8-3.7-0.7 1-0.6 2.7-2.1 2.1-1.2 0.2-0.8 1.1-0.4 2.5-1.4 1.3-3.2 1.6-1.2 1.9-0.4 1.7-3 3.1-13.1-0.3-7.3-4.4-1.9-4-4.5-6.4-1.7-3.6-1.7-7.2-4.5-9-7.7-5.2-8.4-2.6-3.3-3.5-3.9-2.1-9.4-0.1-2.8-1.1-6.8-1-3.5-1.8 2-4.3 6.9-5.8 4-0.6-4.8-5.8-2.7-6.2-3.5-2.7-7.5-2.1-2.7-3.3 3.7-7.1 6.8-1.1 0.5-1.3 0-1.9-0.4-1.8-1.2-0.7-8.5-1.6 2.3-3.9 2.9-2.7 3.4-2.3 1.7-4.8-0.4-4.9 0.1-5.1 1.3-5.1 3.5-0.6 13.1 9.6 2.3-2.7 0.8-5.1-1-5.3-3.1-2.5-4.5-6.9 2.5-9.6 2.4-3.2 3.1-1.2 11 1.6 3.2-0.9 6.9-6.6 3.2-1.6 3.3-0.5 3.3-1.5 3.7-9.1 2.8-2.1 5.5 2 3 7.5 16.4 10.1 2.3 2.6 2.1 3.4 2.6 1.9 12 2.5 13.9-2.2 3.3-1.9 2.9-4 3.1-3 3 1 0.9 5.4 3 3.3 0.4 2.7 0.6 2.4 6.8 4.4 7.7 0.7 16.5 5.2 31.8-6.7z" id="26" name="26" onclick="chooseVoivodeship('26');colourVoivodeship('26');displayName('Świętokrzyskie')">
    </path>
    <path class="voivodship" d="M902.7 429.6l-0.8 0.5-1.8 0-3.1-1.9-1.9-0.4-1.3 0.6-1.5 1-1.6 0.5-1.7-1 0.8-2.5 0.5-0.8-2.8-3.4-1.8-1.1-2.1 1.1-1-3.7-2.2-2.2-3-1-7.7 1.1-15.5-3.2-5.3 0.3-2.4-0.6-1.2-1.9-1.7 0.7-2-1.5-1.7-2.4-0.7-1.8 0.6-5.4-0.3-0.8-1.4-0.2-0.8-0.8-0.5-1.3-0.3-2.1 0.1-1.5 0.7-2.6-0.2-1.6-0.7-1-2.2-1.9-2.1-2.9-5.5-5.9 0.3-3.6-0.4-6.1-1.2-5.8-0.6-8.6-1.5-7.7-5.8 1.6-5.6 2.8-3.1-2.2-2.5-3.5 1.5-9.1-4.8-3.7-4.9 5.4-7.6 1.2-7.1-3.7-2.6-4.9-1.4-6-1.5-4.1-2.4-2.6-3.8-2.1-2.5-4.5-0.5-4.2 1.7-3-4.6-3.6-5.5-0.8-5.3-2.8-3.6-7.1-5.6-14-2.5-19.2-1.6-6.6-2.3-5.4-1.3-5.8 7.3-3.2 14.2 0.9 6.3-2.2 2.9-2.4 3.1-1.3 7.5-1.1 17.2-11.9 9.6-10.9 27.8-17.3 5.7-6.1 3.5-9.8 4-7.8 0.4-7.9-10.6-14.8-5-5-1.1-4.7-0.5-5.1-10.1-13.5 9.4-13.3 22.2-3.1 6.6-4.5 5.7-6 2.5-8.3-0.3-1.3 2.7-1.4 2.1 0.3 5.9 3.1 1.1 0.1 2.3-0.5 1 0.3 1.1 1.1 1 2.6 0.6 1.1 1.1 0.8 3.4 0.4 0.7 0.9-1 3.6 0 1.8 1.8 2.5 2.3 0 2.4-1 2-0.4 1.8 0.8 6.2 5.2 3.8 2.4 8 3 3.8 3.3 1 1.5 1.8 3.5 0.9 1.3 1.1 0.7 2.1 0.6 0.9 0.5 1.7 2.5 1.3 3.4 1.1 3.8 0.8 3.6 1.5 7.9 0 3.9-1.5 2.6-1.2 1-1 1.4-0.1 1.8 0.4 1.5 0.8 1.3 1.1 0.9 0.9 1.6-0.5 1.9 0.1 4.9 1.1 4.2 1.3 3.9 1 4.2 0.9 9 1.1 3.5 2.4 3.5 0.2 10.4 2.4 11.7 8.4 26.1 4.7 9.8 2 5.3 4 15.7 1.8 4.8 1.8 2.4 1 2.3 0.7 2.5 1.2 2.5 1.8 2 1.7 1.3 1 2-0.2 4.1-0.9 2.4-1.2 2-0.9 2.2-0.2 3.3 0.9 2.8 3 3.9 1.1 2.4 0.2 1.3-0.2 3.1 0.8 4.6-0.2 2.3-1.1 2.2-0.3 1.3 0.1 1.8 0.7 1.8 0.3 1.3 1 24.9-1.3 7.1-4 4.9-13.2 9-16.7 4.8-8.8 5.2-8.8 7.3-12.1 18.7-4 4.9-1.8 2.9-4.7 9.5 1.1 0.7z" id="20" name="20" onclick="chooseVoivodeship('20');colourVoivodeship('20');displayName('Podlaskie')">
    </path>
    <path class="voivodship" d="M902.7 429.6l0.7 0.6 1.1 1.6 0.3 2.1-0.8 2.9 2.3 1.5 7.1 1.9 1.6-0.6 1.3 1.3 6.2 2.4 2.1 0.2 0 1-0.8 1.5 1.7-0.3 1.3 0.6 0.9 0.9 0.9 0.2 1.4-1.7 0.4 0.7 1.6 1.6 1.7-1.6 0.4 1.2-0.3 2-0.4 0.5 2.8 5.6 1.9 0.6 4.7-0.1 1.9 1.1 1.8 3.6 2.1 1.3 0.4 1.8 0.1 1.9 0.9 2 1.4 6.1 1.1 2.8-1.6 1.2-1.3 2-1.8 4.5-0.7 3-0.1 5.2-0.6 1.9 0.7 1.1-1.2 0.6-0.4 3.5-1.1 1.4 1.5 2.9 1.9 2.5-1.2 3.7-1.9 1.9-2.1 1.3-1.7 2-0.8 2.9-0.5 3.7 1 1.9 0.2 1-1.3 0.9 0.3 1.1 1.1 1.8-1.2 1.6-1.5 0.4 0 1.2 1.1 1.3 0.1 1.5-0.5 4.4 0.4 2.3 0.8 2.2 2.2 3.8-1.4 0 1.3 2.5 1.6 0.6 1.3 0.8 0.6 3.1 0.7 2.3 1.5 1.1 1.8 0.6 1.4 1-1.5 3.2 0.1 1 4.1 6 0.8 1.9-1.1 0.6-0.7 1.1-0.2 1.6 0.6 2.2-1.8 0.7-1.7 1.9-1.4 2.3-0.5 2.2 0.6 3.3 1.6 0.9 1.9 0 1.7 1.1 5.5 12.1 2.3 2.8 5 3.2 4.8 4.8 1.1 2-1.7 0.8-0.4 1.5 1.5 3.1 2.6 4.1 0.9 2.1 1.2 6.6-0.5 2.3 0.8 0.6 2.5 1.4 1.1 1.7 0.3 2.7 0.6 2.1 1.5 2.4 6.7 6.3 8.3 4.6 1.3 2-1.2 2.7-3.1 0.6-3.3 0.1-2 0.9-2.6-1.5-2.8 0.3-2.3 1.8-1.2 2.7 0.2 3 1.5 2 2.3 1.1 2.8 0.4 0 0.9-1.3 2.8 1.4 2.4 2.7 1.7 2.7 0.7-0.6 3.5 0.8 3.4 2.5 6.1-2.3 4 1 7.5 1.1 2.9-1.2 1.8-1.9 2-6.4 3.3-0.3 1.9 0.2 3-0.2 2.1-0.4 1.7-2.2 5.1-5.3 2.2-18 0.2-3.4 1.1-1.8 0.9-1.3 1.3-1.1 2.3-1.3 4.2-10-5.9-3.2-4.9-6.3-4-7.3-0.8-5.7 0.5-2.6 1.2-8.2 9.3-6.5 5.2-7.5 1.6-22.4-0.7-13.6-3.9-1-2.3 3.4-0.8 1.5-0.9-2.6-1.9-13.9 2.8-3.5-1.6-2.6-4-0.7-3.9 1.6-3.3 2.5-3.3 3.1-1 3.1 0.4 2.8-1.6-1.2-3.8-2.3-4.4-0.3-2.2 0.1-2.1-0.9-1.5-15.7-8.4-23.2-5.9-1.9-3.3 4.6-8.5 1.4-4-3.2-2.8-3.5-2.2-3.9-1.5-3.9 0.2-6.6 4.6-7.4-0.4-13.2-8.9-0.5-3.4-2.5-9.7-0.4-2-1-0.7-0.1-1.9 0.7-1.3 0.7-6.8-0.3-3.1-1.8-1.4 0-1.1 1.5-0.5 1.2-1.6-0.4-2.2-2.4-6.1-0.8-5.1-0.9-2.8-0.2-1.3 0.1-1.8 1.2-3.7 1.8-9.9 1.3-2.5 0.9-0.8 1.1-0.2-0.2-3.3 1.2-4.9 0.6-4.5-4-4.8 0.2-3.9 2.4-1.9 2.4-3.4 0.1-6.5-3.1-0.3 0-1.1 1.5-1.8-0.3-2-1.8-2.8-0.2-2.2 0.1-1.9-0.4-1.4-1.5-1-1-0.1-2.4 1.1-1.8 0.1-5.1-1-2.8-1.3-1.4-1.8-1.3-2.1-0.1-1.7 1-4.1 3.6-0.9 3.6 1.4 7.2 1.2 7.1-2.5 2.5-2.4 0.6-3.7-5-7.7 3.8-5.4 5.5-3.4-3.5-5.3-2.4-6-0.4-4.3-2-4.2-1.6-4.5-0.6-4.1 7.1-5.3 7.6-2.2 14.4 0.1 13.6-2.7 5.1 0.9 3.5-1.1 9.5-7.1 3.8-0.5 11 1.1 5.5-4.6 0.5-2.4 0.6-2 1.7-1.8 1.8-1.2 4 0.9 11.7 6.1 3.9-1.5 3.3-4.2 2.8-6.7 9.5-14 3.2-6 1.3-0.6 1.9 0.4 3.1 1.9 1.8 0 0.8-0.5z" id="6" name="6" onclick="chooseVoivodeship('6');colourVoivodeship('6');displayName('Lubelskie')">
    </path>
    <path class="voivodship" d="M950.7 741.8l-1.4 2.2-7.9 8.6-2.9 2.3-9.9 7.7-22.8 24.8-3 4.6-3.6 2.9-4 4.4-10.8 15.9-4.1 4.3-0.6 1.2-0.8 3.2-0.4 1.1-0.9 0.8-1.8 0.7-0.8 0.6-1 1.2-6.1 11.1-1.7 1.7-1.1 0.5-2.1 0.4-1.2 1-0.7 1.3-1.7 4.9-7.6 10.2-2.4 5.9 1.9 5.5 0.6 2.3 0.7 6.5 0.6 2.6 1.3 2 2.2 2.3 0.5 1.2 0.5 2.4 1.3 14-0.4 2.3-1.6 4.6-1.5 5.4-1.5 3.3-0.6 1.9 1.1 0.5 1.3-1.7 1.1 1.3 3.2 2.2 2.9 3.9 1.9 1.4 4.4 2.5 1.2 1.5 0 1.3-0.9 3-0.1 2 0.4 1.5 2 3.6-1.2 2.4-2-0.9-2.2-2-2.9-1.3-1.8-2.5-1-1-1.1-0.1-2.3 0.7-3.6-0.3-2.1 0.2-2.1-0.3-2.5-1.6-3.7-4.2-2-0.6-2.1 2-3.5-1.7-7.8-0.3-3.6-1.2-5.1-5-2.1-0.9-5.5 0.2-4.7-1.4-0.7-0.6-0.2-1 0.2-2.1-1.1-1.2-0.8-0.1-2.4 0.3-2.1-0.6-3.3-2.1-7-1.4-2.8-2-0.7-4.9-1.3-5.4-2.8-4.6-3.6-3.4-5.4-2.7-3.6-3.4-1.8-1-2.1 0.3-1.7 1.6-1.4 1.7-1 0.7-1.6-1.2-3.3-5.2-1.7-1.7-1-0.3-1.5 0.3-1.8-0.8-1.8-1.8-1-0.7-1.9-0.5-7.1 0.8-1.5 0.6-3.8-10.6-1.8-11.2 0.6-5.4-0.4-5.4-3.4-10.7-6-6.5-10.7-4.6-3-2.7 1.7-3.9 9.9-7.6-1.3-4.5-3.7-2-2.9-0.2-2.1-2.5-0.8-2.2-0.9-1.7 0.1-6 0.8-6.9-2.7-23.4 0.7-8.8 3.7-6.4 3-7.4 1.1-13.1 0.4-0.2 6.1-5.3 1.9 0.8 2.5-0.5 2.5-1.5 1.9-2-1.3-3.2 9.5-4.3 6.4-1.6 1.8-1.6 3.1-3.7 1.2-2.4 0.5-3.1 0.7-2.4 4.8-5.6 2.8-4.8 1.7-1.3 2.6-0.4 1.8-0.9 1.5-2.4 1.2-2.8 0.7-2.5 0.8-6.2-0.1-5.8-0.3-2.1 13.2 8.9 7.4 0.4 6.6-4.6 3.9-0.2 3.9 1.5 3.5 2.2 3.2 2.8-1.4 4-4.6 8.5 1.9 3.3 23.2 5.9 15.7 8.4 0.9 1.5-0.1 2.1 0.3 2.2 2.3 4.4 1.2 3.8-2.8 1.6-3.1-0.4-3.1 1-2.5 3.3-1.6 3.3 0.7 3.9 2.6 4 3.5 1.6 13.9-2.8 2.6 1.9-1.5 0.9-3.4 0.8 1 2.3 13.6 3.9 22.4 0.7 7.5-1.6 6.5-5.2 8.2-9.3 2.6-1.2 5.7-0.5 7.3 0.8 6.3 4 3.2 4.9 10 5.9z" id="18" name="18" onclick="chooseVoivodeship('18');colourVoivodeship('18');displayName('Podkarpackie')">
    </path>
    <path class="voivodship" d="M402 614.4l2.3 4 2.9 2.4 22.3 5.7 7-0.2 1.3-1.1 0.9-1.7 1.2-0.6 2.7 3.2 2.3 4.6 7.5 6-3.4 12.2-1.3 1.5-0.7 2.4 0.6 3.6 1.3 2.9-0.7 5.6-7.8 5.1-2.6 5.6-1.8 9.8-2.4 6.5 1.9 5.9 2.7 3.6 3.2 2.5 3.2 3.4 1.1 5.7-14.4-0.1-3 0.7-1.3 3.5 1.1 2.7-0.2 2.9-2.2 1-2.1 0.4-0.9 3.2 1.7 20.1-0.1 7.9-1.1 4.6-9.6 4.5-6 4.5-12.5 2.7-6 11.6-0.1 2.6-1.7-0.4 0.5 3.5 0.5 0.2 1.6-0.2 0.7 1.1 0.2 1.5-0.5 0.7-3.2 1-4 0.1-1.8 0.5-3 2.6-3.6 1.1-3.6-0.8-6.5-6.4-1.1-1.6-0.8-1.8-1.2-3.7-2-2.2-0.4-0.9 1.3-2.2-1.4-0.3-2.7-1.3-1.3-0.4-2.9 0.9-1.6-0.7-4.8-6.1-0.2-1.2 0.7-1.5 1.1-0.6 4.8-0.2 2.7-1 4.2-2.6 2-1.7 0.9-2.4-1.5-2.8-1.1-1.1-0.2-1.6 0.2-1.4 1.3-3.4 0-0.9-2-2.8-0.6-0.5-1.7-0.7-0.6 0.4-0.8 2.4-3 4.1-1.7 1.4-2.3 0.6-8.9-1.6-4.8 0.4-2.9 3.6-1 0.5-1.1-0.5-0.9-2.9-2.2-1.8-2.2 0.2-1.1 2.9-1.3-1-0.7-1.6-0.2-2 0.2-2.1-1.5-1.9 1.8-0.8-2.1-0.8-4.6 0.1-2.4-0.7-3.5-2.2-1-1.1-0.6-1.3-0.9-3.7-1-0.8-3 0.6-1.4 0-1.3-0.7-2.3-2-1.1-0.6-10.2-2.9-2.3 0.3-1.5-0.9 0.4-1.9 7.2-17.9 5.2-4 6.1-1 3.5-6.2 2.3-8.8 7.2-13.7 8.3-12.3 3.6-8.3 4.7-6.2 3.2-2.1 1.6-4.8 0.6-4.1 1-3.9 5.8-13.3 2.6-2.8 3.3-1.1 3.4 0.2 3.5-0.8 3.3-2.1 3.4-0.2 3.3 1.7 1.3 3.5 0.6 3.8 5.2 4.3 6.4 0.3 11.8-4.3 11.3-6.8z" id="16" name="16"  onclick="chooseVoivodeship('16');colourVoivodeship('16');displayName('Opolskie')">
    </path>
    <path class="voivodship" d="M715.3 728.7l-1.1 13.1-3 7.4-3.7 6.4-0.7 8.8 2.7 23.4-0.8 6.9-0.1 6 0.9 1.7 0.8 2.2 2.1 2.5 2.9 0.2 3.7 2 1.3 4.5-9.9 7.6-1.7 3.9 3 2.7 10.7 4.6 6 6.5 3.4 10.7 0.4 5.4-0.6 5.4 1.8 11.2 3.8 10.6-1.9 0.8-1.4-0.4-3.7 0.8-1.7 0-9.7-2.8-5.6-3-1.3-0.3-1.8 1.3-3.1 4.6-1.8 1.6-2.1 0.3-1.5-1-1.4-1.6-1.8-1.2-1.6-0.2-4 0.8-1.6 0.8-2 2.2 1.2 1.4 2.3 1.4 1.3 2.3-0.9 1.4-1.8 0.4-2.1 0-1.6 0.4-2 2-3.3 4.7-2.1 1.9-2.4 0.9-1.8-0.4-1.6-1.2-1.6-1.7-1.9-1.4-1.6-0.2-1.7 0.1-2.2-0.3-1.6-1.2-8.8-10.6-1.6-0.3-3.7 0.6-3.1-0.2-1 0.6-1.6 1.9-1.1 1.1-2.4 0.8-2.2-0.5-8.4-4.3-1.6 0.4 0.1 2.6-5.2 0.2-4.1-1.6-1.2 0.1-1 0.7-0.3 1-0.8 3.6-0.7 2.1-0.5 0.7-7.7 0.7-1.5 0.8-2.1 2.6-1 0.9-2.2-0.2-0.8 0.5-1.9 4.3-1.3 3.5-1.2 1.5-0.6 5.3-1 3.8-2 1.5-3.3-1.6-5.1-4.8-2.8-1.5-3.2 0.4-1.8 1.3-3.3 3.5-2.2 0.8-4.6-0.3-2.5-1-1.3-1.7 0.4-2.1 3.8-6.1 1.6-0.9 0.1-1.5-1-1.3-1.4-1-0.3-1.2 0.9-1.7-0.5-7.4-0.6-2.6-0.9-2.9-0.9-0.7-3.3 1.4-2 0.2-2.2-0.2-5.7-2 0.2-1.9-0.1-2.3 0.6-1.8-4-0.1-2-0.5-1.7-1.4-0.6-1.1-1.6-4.8-1.8-7.8-1.2-3.1-2.3-1.5-0.8-0.8-1.6-3-0.9-0.4-0.5-1.7-2.4-1.6-1.2-2.8 0.8-3.2 1.7-3.5 0.4-4-6.8-1.2-3.7-1.7-3.2-3-1.5-4.8-2.1-3.7-5-2-3-5.3-0.2-5.2-2.2-2.7-2.6-0.3-2-2.6 1.1-5.2 2.2-4.5 2.2-3.3 23.6-26.6-4.6-6.4-5.3-5.3 3.1-2.4 6.7 0.9 4.3-6.2 2.8-5.6 2.7-4 5.5 3.2 2.5 0 2.6-0.6 8.8-6.8 5.5-0.9 5.5 0.5 3.2-0.5 12.6-8-0.3-2.8-0.6-3.4 9.4 0.1 3.9 2.1 3.3 3.5 8.4 2.6 7.7 5.2 4.5 9 1.7 7.2 1.7 3.6 4.5 6.4 1.9 4 7.3 4.4 13.1 0.3 3-3.1 0.4-1.7 1.2-1.9 3.2-1.6 1.4-1.3 0.4-2.5 0.8-1.1 1.2-0.2 2.1-2.1 0.6-2.7 0.7-1 3.8 3.7 1.6-0.8 1.4-1.4 1.3-0.9 1.6 1 1.3-0.9 2.7-0.2 1-0.6 1.8-2 1-0.4 7.4-0.2 1.5-0.4 3-2.8 4.1-2 1-0.2 1.4 0.5 1.9 2.1 1.8-0.7 1.7-2.4 1.6-0.9 0.1-1.3 0.6-0.8 1.1-0.6 1.2-1.1 0.5-2.2 1 0.8 0.6 0 1.2-0.8-0.1-1.9 1.8-0.2z" id="12" name="12"  onclick="chooseVoivodeship('12');colourVoivodeship('12');displayName('Małopolskie')">
    </path>

    

 	 <script type="text/javascript">
 	 	var names = ['2','4','6','8','10','12','14','16','18','20','22','24','26','28','30','32'];
 	 	<![CDATA[
    function displayName(name) {
    	document.getElementById('voivodeship-name').firstChild.data = name;
    }

    function chooseVoivodeship(id){
    	var voivodeship = document.getElementById('voivodeship_id');
    	voivodeship.setAttribute("value", id);
	}

	function colourVoivodeship(name) {
	var colour = '#004400';
    var voivodeshipColour = document.getElementById(name);
    voivodeshipColour.setAttributeNS(null, 'fill', colour); 
    for (var i = 0; i < names.length; i++) { // prevent multi colour
    	if (names[i] != name) {
    		colourGrey(names[i])
    		}
		}
	}

	function colourGrey(name) {
	var colour = '#696969';
    var voivodeshipColour = document.getElementById(name);
    voivodeshipColour.setAttributeNS(null, 'fill', colour); 
	}
    ]]></script> 
    <svg class="circles">
    </svg>
   </svg><a>Wybrano: </a><p class="label" id="voivodeship-name" x="10" y="390"> </p>
   <button class="btn btn-success" type="submit">Szukaj</button> 
</form>

						</center><br><br>
					</main>
					<footer>
						<?php
						require_once "includes/footer.inc.php"; ?>
					</footer>

					<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
					<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
					<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
					<script type="text/javascript" src="js/jquery.js">  </script>
					<script src="js/bootstrap.min.js"></script>
					<script src="js/toggleDarkLight.js"></script>
					<script src="js/map.js"></script>
				</body>

				</html>


