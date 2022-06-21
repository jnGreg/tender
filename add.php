
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
  <title>Dodaj ogłoszenie</title>
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
      <div id = "container" style="background-color: #E4FAFF; border-radius: 25px;">
        <center> <br><h4> Dodaj nowe Ogłoszenie </h4><br><br><br>
          <?php   
        if(isset($_GET["error"])){
          if ($_GET["error"] == "emptyinput"){
           echo "<h2 style='color:red;'>Uzupełnij wymagane pola.</h2><br>";
          }} ?>
          
        <form id="add_tender_form" method="post" action="includes/add.inc.php" align=left enctype="multipart/form-data">

        <p> Uzupełnij poniższe pola... <a style="color:red; font-size:20px">&nbsp( * - wymagane)</a></p>
        <p> <a style="color:red; font-size:24px">*&nbsp&nbsp</a><input type=text name=f_title placeholder="Tytuł ogłoszenia..." size="72" maxlength="75"></p>
        <p> <a style="color:red; font-size:24px">*&nbsp&nbsp</a>Wybierz kategorię 
          <select class="form-control" id="category" name="category" style="width:355px;">
          <option value="" disabled selected>Kategoria...</option>
						<?php 
							$sql = "SELECT * FROM ctgrs;";
							$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_array($result)){ 
									?><option value="<?php echo $row["ctgr_id"];?>"><?php echo $row["category"];?></option><?php
								}	
						?>
        </select></p>

        <p> <a style="color:red; font-size:24px">*&nbsp&nbsp</a>Wybierz podkategorię <select class="form-control" id="subcategory" name="subcategory" style="width:355px;">
           <option value="" disabled selected>Wybierz najpierw kategorię...</option>
						
        </select></p> 

        <p> <a style="color:red; font-size:24px">&nbsp</a>Wybierz stan...<select class="custom-select" id="inputCondition" name="f_item_condition" style="width: 200px; margin: 5px;">
          <option value="nd" selected>Stan</option>
          <option value="Nowe">Nowe</option>
          <option value="Powystawowe">Powystawowe</option>
          <option value="Używane">Używane</option>
          <option value="Uszkodzone">Uszkodzone</option>
        </select> </p> <br><br>

        <br><p> Opisz przedmiot. Dopuszczalna liczba znaków wynosi 250. </p>
        <textarea form="add_tender_form" id="add_tender_description" name="f_description" placeholder="Opis..." rows="8" cols="75" maxlength="250"></textarea> <br><br><br> <p>Dodaj maksymalnie 5 zdjęć (pierwsze będzie zdjęciem głównym). <br>Dopuszczalny rozmiar zdjęcia wynosi 500 kB.</p>
          <?php if(isset($_GET["error"])){
           if ($_GET["error"] == "stmtfailed"){
           echo "<h2 style='color:red;'>Nastąpił nieoczekiwany błąd! Spróbuj ponownie.</h2><br>";
          }
          if ($_GET["error"] == "invalidsize1"){
           echo "<h2 style='color:red;'>Rozmiar 1. zdjęcia przekracza dopuszczalny limit.</h2><br>";
          }
          if ($_GET["error"] == "invalidsize2"){
           echo "<h2 style='color:red;'>Rozmiar 2. zdjęcia przekracza dopuszczalny limit.</h2><br>";
          }
          if ($_GET["error"] == "invalidsize3"){
           echo "<h2 style='color:red;'>Rozmiar 3. zdjęcia przekracza dopuszczalny limit.</h2><br>";
          }
          if ($_GET["error"] == "invalidsize4"){
           echo "<h2 style='color:red;'>Rozmiar 4. zdjęcia przekracza dopuszczalny limit.</h2><br>";
          }
          if ($_GET["error"] == "invalidsize5"){
           echo "<h2 style='color:red;'>Rozmiar 5. zdjęcia przekracza dopuszczalny limit.</h2><br>";
          }
          if ($_GET["error"] == "invalidtype1"){
           echo "<h2 style='color:red;'>Zdjęcie 1. musi być typu: .jpg, .jpeg ,.png.</h2><br>";
          }
          if ($_GET["error"] == "invalidtype2"){
           echo "<h2 style='color:red;'>Zdjęcie 2. musi być typu: .jpg, .jpeg ,.png.</h2><br>";
          }
          if ($_GET["error"] == "invalidtype3"){
           echo "<h2 style='color:red;'>Zdjęcie 3. musi być typu: .jpg, .jpeg ,.png.</h2><br>";
          }
          if ($_GET["error"] == "invalidtype4"){
           echo "<h2 style='color:red;'>Zdjęcie 4. musi być typu: .jpg, .jpeg ,.png.</h2><br>";
          }
          if ($_GET["error"] == "invalidtype5"){
           echo "<h2 style='color:red;'>Zdjęcie 5. musi być typu: .jpg, .jpeg ,.png.</h2><br>";
          }
          if ($_GET["error"] == "phototype"){
           echo "<h2 style='color:red;'>Dopuszczalne typy zdjęć to: .jpg, .jpeg ,.png.</h2><br>";
          }
          if ($_GET["error"] == "limitexceeded"){
           echo "<h2 style='color:red;'>Wybierz maksymalnie 5 zdjęć.</h2><br>";
          }} ?>

        <div class = "inline-block" ><img src="img/add-image.png" alt="Submit" width="120" height="120">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />
        <input type="file" name="file[]" id="file" accept=".jpg, .jpeg, .png" multiple > <br>
        
        <br><br><br><br>
        <p>
        Nadaj cenę wywoławczą i, opcjonalnie, cenę minimalną oraz zakupu natychmiastowego:
        </p>
        <br><p><a style="color:red; font-size:24px">*&nbsp&nbsp</a>Aukcja rozpocznie się od...&nbsp<input type=number name=f_start_price id="start_price_input" placeholder="Cena wywoławcza" step=0.01 style="width: 150px;" min="1">  zł
        	&nbsp&nbsp&nbspi będzie trwała...&nbsp<input type=number name=f_duration placeholder="od 1 do 14" step=1 style="width: 150px;" min="1" max="14">  dni</p>
        <br>

        <input type="checkbox" class="btn-check" id="f_min_price_on" style="display: none;" onclick="showMinPriceInput()" />
        <label for="f_min_price_on" class="btn btn-primary">Dodaj cenę minimalną</label> 
        <p>
        <input id="add_min_price_input" type=number name=f_min_price style="width: 150px;" step=0.01 placeholder="Cena minimalna" min="1"/> </p>
        <script>
          function showMinPriceInput() {
            var x = document.getElementById("add_min_price_input");
            if (x.style.display === "block") {
              x.style.display = "none";
            } else {
              x.style.display = "block";
            } 
          }
        </script>
        <br>
        <input type="checkbox" class="btn-check" id="f_end_price_on" style="display: none;" onclick="showEndPriceInput()" />
        <label for="f_end_price_on" class="btn btn-primary">Dodaj cenę zakupu natychmiastowego</label> 
        <p>
        <input id="add_end_price_input" type=number name=f_end_price style="width: 150px;" step=0.01 placeholder="Cena Kup Teraz" min="1"/> </p>
        <script>
          function showEndPriceInput() {
            var x = document.getElementById("add_end_price_input");
            if (x.style.display === "block") {
              x.style.display = "none";
            } else {
              x.style.display = "block";
            }
          }
        </script>
         <script type="text/javascript">
          $("#start_price_input").change(function() {
            $("#add_min_price_input").attr('min', Math.floor($("#start_price_input").val()*1.1).toFixed(2));
            $("#add_end_price_input").attr('min', Math.floor($("#start_price_input").val()*1.2).toFixed(2));
          });
        </script>
       	<br><p> Określ sposoby i ceny dostawy. Dopuszczalna liczba znaków wynosi 100. </p>
        <textarea form="add_tender_form" id="add_tender_description" name="f_delivery" placeholder="Odbiór osobisty..." rows="4" cols="75" maxlength="100"></textarea> <br>
        <br><br><p>Dane kontaktowe, które zobaczą inni Użytkownicy:</p><?php
        $query = "SELECT * FROM users WHERE user_id = '".$_SESSION['userid']."'";
        $results = mysqli_query($conn, $query); 
        while($row = mysqli_fetch_array($results)) {?>
        <p> Imię:&nbsp&nbsp&nbsp&nbsp<input type=text name=f_first_name size="50" placeholder="<?php echo $row['first_name'];?>" value = "" disabled ></p>
        <p> Lokalizacja:&nbsp&nbsp&nbsp&nbsp<?php  
            $query_city = "SELECT * FROM cities WHERE city_id = '".$row['city_id']."'";
            $results_city = mysqli_query($conn, $query_city); 
          while($row_city = mysqli_fetch_array($results_city)) { echo $row_city['city']; }?> , <br>woj.&nbsp&nbsp&nbsp&nbsp<?php  
            $query_voivodeship = "SELECT * FROM voivodeships WHERE voivodeship_id = '".$row['voivodeship_id']."'";
            $results_voivodeship = mysqli_query($conn, $query_voivodeship); 
          while($row_voivodeship = mysqli_fetch_array($results_voivodeship)) { echo $row_voivodeship['voivodeship']; }?>


          <input hidden type=number name=f_voivodeship value = "<?php echo $row['voivodeship_id']; ?>" >
          <input hidden type=number name=f_city value = "<?php echo $row['city_id']; ?>" ></p>

        <p> Adres email:&nbsp&nbsp&nbsp&nbsp<input type=email name=f_email size="50" placeholder="<?php echo $row['email'];?>" value = "" disabled ></p>
        <p> Numer tel.:&nbsp&nbsp&nbsp&nbsp<input type=number name=f_number style="width: 392px;" placeholder="<?php echo $row['phone'];?>" value = "" disabled ></p>
    <?php } ?>

        <p> <input type=datetime-local name=f_tender_addDate hidden value="01/19/2021, 4:10:00 PM"></p><br>
        <p> <button class="btn btn-success" style="float:right" type="submit" name="submit_tender">Utwórz ogłoszenie!</button></p>

        </form>
        
        </center>
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
        </body>

        </html>