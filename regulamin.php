
<?php
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
	<title>Regulamin Serwisu</title>
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
		<head><h2>Regulamin serwisu Tender</h2></head><br><br>
		<div id="tresc_regulaminu" style="text-align: left; margin-left: 25%; margin-right: 20%">
			<article><h4>Spis treści</h4></article>
				<h5><a href="#reg_definicje">I. Definicje</a><br>
				<a href="#reg_postanowienia_ogolne">II. Postanowienia ogólne</a><br>
				<a href="#reg_konto">III. Konto</a><br>
				<a href="#reg_zasady_skladania_ofert">IV. Zasady składania Ofert</a><br>
				<a href="#reg_zasady_dodawania_ofert">V. Zasady dodawania Ogłoszeń</a><br>
				<a href="#reg_postanowienia_koncowe">VI. Postanowienia końcowe</a></h5>
				<br><br>
				<article><h4 id="reg_definicje">I. Definicje</h4></article>
					<b>Cena minimalna</b> - opcjonalna kwota ustalana w chwili dodawania Ogłoszenia, której przekroczenie pozwala na uznanie Oferty za wiążącą.<br>
					<b>Dane Użytkownika</b> - zbiór danych dot. Użytkownika podawanych podczas Rejestracji.<br>	
					<b>Gość</b> - osoba nieposiadająca konta w serwisie.<br>
					<b>Konto</b> - zbiór danych powiązanych z danym Użytkownikiem.<br>
					<b>Licytacja</b> - proces składania oferty dla Ogłoszenia.<br>
					<b>Oferta</b> - zadeklarowana kwota, jaką Użytkownik deklaruje, że jest w stanie zapłacić za przedmiot Ogłoszenia.<br>
					<b>Ogłoszenie</b> - propozycja sprzedaży przedmiotu, mająca charakter prawny ogłoszenia.<br>
					<b>Użytkownik</b> - osoba posiadająca konto w serwisie. Użytkownik zobowiązany jest do przestrzegania Regulaminu.<br>
					<b>Regulamin</b> - niniejszy Regulamin.<br>
					<b>Rejestracja</b> - proces utworzenia Konta.<br>
					<b>Serwis</b> - Tender.<br>
					<b>Użytkownik</b> - osoba posiadająca konto w serwisie. Użytkownik zobowiązany jest do przestrzegania Regulaminu.<br>
					<b>Regulamin</b> - niniejszy Regulamin.<br>
					<b>Zakup Natychmiastowy</b> - opcjonalna kwota Oferty ustalana w chwili dodawania Ogłoszenia, której złożenie pozwala na natychmiastowe zakończenie Ogłoszenia i uznanie Oferty za wiążącą.<br>
					<b>Zwycięzca</b> - Użytkownik, który złożył najwyższą Ofertę w Ogłoszeniu przed, lub w momencie, jej zakończenia.<br>
					<br><br>
				<article><h4 id="reg_postanowienia_ogolne">II. Postanowienia ogólne</h4></article>
					1. Warunki korzystania z Serwisu definiuje poniższy Regulamin.<br>
					2. Goście mogą korzystać jedynie z ograniczonych funkcji Serwisu.<br>
					3. Treści publikowane w Serwisie, w tym Ogłoszenia oraz Dane Użytkownika są przechowywane przez Tender.<br>
					4. Tender nie jest stroną transakcji handlowej, a Ogłoszenia mają charakter prawny ogłoszeń.<br>			
					5. W ramach serwisu możliwe jest:<br>
					5.1. Rejestracja (zakładanie Konta Użytkownika),<br>
					5.2. Przeglądanie Serwisu, wyszukiwanie interesujących Ogłoszeń,<br>
					5.3. Składanie Ofert,<br>
					5.4. Dodawanie Ogłoszeń,<br>
					5.5. Obserwowanie Ogłoszeń.<br>
					6. Usługi dostawy i płatności realizowane są przez zewnętrznych usługodawców na rzecz Użytkowników.<br><br><br>
				<article><h4 id="reg_konto">III. Konto</h4></article>
					1. W celu uzyskania pełnej funkcjonalności Serwisu Gość powinien dokonać Rejestracji Konta i korzystać z Serwisu jako zalogowany Użytkownik.<br>
					2. Użytkownikiem może być osoba fizyczna lub firma.<br>
					3. Użytkownik może posiadać tylko jedno Konto w Serwisie.<br>
					4. Rejestracja Konta wymaga:<br>		
					4.1. Wypełnienia formularza Rejestracji,<br>
					4.2. Przeczytania oraz akceptacji Regulaminu.<br>	
					5. Użytkownik zapewnia, że dane podawane w procesie Rejestracji oraz w toku korzystania z Serwisu są prawdziwe.<br>
					6. Konto Użytkownik może zostać zawieszone lub skasowane w następstwie Jego nieuczciwych zachowań.<br><br><br>
				<article><h4 id="reg_zasady_skladania_ofert">IV. Zasady składania Ofert</h4></article>
					1. Każde Ogłoszenie musi posiadać wyjściową kwotę, od jakiej zaczyna się Licytacja jej przedmiotu.<br>
					2. Czas trwania Licytacji ustalany jest wraz z dodawaniem Ogłoszenia.<br>
					3. W momencie zakończenia Licytacji Zwycięzcą zostaje Użytkownik, który złożył najwyższą Ofertę.<br>
					4. Cena minimalna jest opcjonalna, a w wypadku jej nieprzekroczenia w chwili zakończenia Licytacji, Ofera zostaje uznana za niewiążącą.<br>	
					5. Cena Zakupu Natychmiastowego jest opcjonalna, a jej złożenie pozwala na natychmiastowe zakończenie Ogłoszenia i uznanie Oferty za wiążącą.<br>
					6. Użytkownik nie może składać Ofert dla własnych Ogłoszeń, w szczególności w celu sztucznego zawyżania ceny.<br><br><br>
				<article><h4 id="reg_zasady_dodawania_ofert">V. Zasady dodawania Ogłoszeń</h4></article>	
					1. Wystawianie Ogłoszeń jest bezpłatne.<br>
					2. Ogłoszenie musi przedstawiać stan faktyczny przedmiotu, zdjęcia nie mogą być przerobione w programie do obróbki grafiki.<br>
					3. Przedmiot Ogłoszenia musi znajdować się w posiadaniu Użytkownika.<br>
					4. Wysokość oferowanych opcji dostawy nie może sztucznie przejmować części ceny przedmiotu Ogłoszenia.<br>
					5. Zabronionym jest wystawianie kolejnego Ogłoszenia tego samego przedmiotu, jeśli bieżące Ogłoszenie jest aktualne.<br><br><br>
				<article><h4 id="reg_postanowienia_koncowe">VI. Postanowienia końcowe</h4></article>
					1. Tender zastrzega sobie prawo zmiany Regulaminu.<br>
					2. W przypadku wprowadzenia zmian do Regulaminu Tender zobowiązuje się do poinformowania za pośrednictwem wiadomości e-mail na przypisany do Konta adres Użytkownika o zmianach na 15 dni przed ich wprowadzeniem.<br>
					3. Zmiany Regulaminy muszą być zaakceptowane przez Użytkownika w ciągu 30 dni od ich wprowadzenia.<br>
					4. W celu rozwoju Serwisu Tender ma prawo wprowadzenia nowych usług i funkcjonalności.<br>
				</div><br><br><br></center>
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


