<?php 
include ('includes/config.inc.php');

$voivodeshipId = isset($_POST['voivodeshipId']) ? $_POST['voivodeshipId'] : 0;
$cityId = isset($_POST['cityId']) ? $_POST['cityId'] : 0;

$categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : 0;
$subcategoryId = isset($_POST['subcategoryId']) ? $_POST['subcategoryId'] : 0;

$command = isset($_POST['get']) ? $_POST['get'] : "";

switch ($command) {

    case "city":
        $result1 = "<option disabled selected>Wybierz miasto...</option>";
        $statement = "SELECT * FROM cities WHERE voivodeship_id='$voivodeshipId' ORDER BY city;";
        $dt = mysqli_query($conn, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['city_id'] . ">" . $result['city'] . "</option>";
        }
        echo $result1;
        break;

    case "subcategory":
        $result2 = "<option disabled selected>Wybierz podkategorię...</option>";
        $statement = "SELECT * FROM subctgrs WHERE ctgr_id='$categoryId';";
        $dt = mysqli_query($conn, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result2 .= "<option value=" . $result['subctgr_id'] . ">" . $result['subcategory'] . "</option>";
        }
        echo $result2;
        break;


}
 exit(); ?>

