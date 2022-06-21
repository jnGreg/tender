
 <?php

 require ('config.inc.php');

  
 if (isset($_POST['submit_tender'])) {
  	
   $file = $_FILES['file'];
   $file_name = $_FILES['file']['name'];
   $file_tmp_name = $_FILES['file']['tmp_name'];
   $file_size = $_FILES['file']['size'];
   $file_error = $_FILES['file']['error'];
   $file_type = $_FILES['file']['type'];
   $file_ext = explode('.', $file_name);
   $file_actual_ext = strtolower (end($file_ext));
   $allowed = array('jpg','jpeg','png');

   if (in_array($file_actual_ext, $allowed)) {
    if ($file_error === "0") {
      if ($file_size < 400) {
        $file_new_name = uniqid('', true).".".$file_actual_ext;
        $file_destination = 'img/uploads/'.$file_new_name;
        save_uploaded($file_tmp_name, $file_destination);
      } else {
        echo "Dopuszczalna wielkość zdjęcia wynosi 400 kB.";
      } } else {
      echo "Nastąpił nieoczekiwany błąd! Spróbuj ponownie.";
    }
  } else{
    echo "Dopuszczalne typy zdjęć: .jpg, .jpeg ,.png";
  } }
 ?>