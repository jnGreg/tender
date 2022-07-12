<?php

require ('config.inc.php');
session_start(); 

if (isset($_POST['submit_tender'])) {

	require_once('functions.inc.php');

	$allowed = array('jpg','jpeg','png');
	$countfiles = count($_FILES['file']['name']);

	for($i=0;$i<$countfiles;$i++){
		$file_name = $_FILES['file']['name'][$i];
		$file_tmp_name = $_FILES['file']['tmp_name'][$i];
		$file_size = $_FILES['file']['size'][$i];
		$file_error = $_FILES['file']['error'][$i];
		$file_type = $_FILES['file']['type'][$i];
		$file_ext = explode('.', $file_name);
		$file_actual_ext = strtolower (end($file_ext));

		if ($i === 0) {
			$size1 = $file_size;
			$type1 = $file_actual_ext;
		} 
		else if ($i === 1) {
			$size2 = $file_size;
			$type2 = $file_actual_ext;
		} 
		else if ($i === 2) {
			$size3 = $file_size;
			$type3 = $file_actual_ext;
		} 
		else if ($i === 3) {
			$size4 = $file_size;
			$type4 = $file_actual_ext;
		} 
		else if ($i === 4) {
			$size5 = $file_size;
			$type5 = $file_actual_ext;
		} 

		if (in_array($file_actual_ext, $allowed)) {
			if ($file_error === 0) {
				if ($file_size < 500000) {
					$file_new_name = uniqid('', true).".".$file_actual_ext;
					$file_destination = '../img/uploads/'.$file_new_name;
					move_uploaded_file($file_tmp_name, $file_destination);
					if ($i === 0) {
						$photo1 = $file_new_name;
					} 
					else if ($i === 1){
						$photo2 = $file_new_name;
					}
					else if ($i === 2){
						$photo3 = $file_new_name;
					}
					else if ($i === 3){
						$photo4 = $file_new_name;
					}
					else if ($i === 4){
						$photo5 = $file_new_name;
					}
				}
				else {
					echo "Dopuszczalna wielkość zdjęcia wynosi 500 kB.";
				}
			}
			else { echo $file_error;
				echo "Nastąpił nieoczekiwany błąd! Spróbuj ponownie.";
			}
		}
		else{
			echo "Dopuszczalne typy zdjęć: .jpg, .jpeg ,.png";
		}
	}

	$owner_id = $_SESSION['userid'];
	$title = $_POST['f_title'];
	$category = $_POST['category'];
	$subcategory = $_POST['subcategory'];
	$item_condition = $_POST['f_item_condition'];
	$description = $_POST['f_description'];
	$start_price = $_POST['f_start_price'];
	$duration = $_POST['f_duration'];
	$min_price = $_POST['f_min_price'];
	$end_price = $_POST['f_end_price'];
	$delivery = $_POST['f_delivery'];
	$voivodeship = $_POST['f_voivodeship'];
	$city = $_POST['f_city'];

	if (emptyInputAdd($title, $category, $subcategory, $start_price, $duration) !== false) {
		header("location: ../add.php?error=emptyinput");
		exit();
	}

	if($countfiles === 0) {
		addTenderZero($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city);
	}

	else if($countfiles === 1) {
		if (invalidPhotoSizeOne($size1) !== false) {
			header("location: ../add.php?error=invalidsize1");
			exit();
		}
		else if (invalidPhotoTypeOne($type1, $allowed) !== false) {
			addTenderZero($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city);
		}
		else{
			addTenderOne($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1);
		}
	}

	else if($countfiles === 2) {
		if (invalidPhotoSizeOne($size1) !== false) {
			header("location: ../add.php?error=invalidsize1");
			exit();
		}
		else if (invalidPhotoTypeOne($type1, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype1");
			exit();
		}
		else if (invalidPhotoSizeTwo($size2) !== false) {
			header("location: ../add.php?error=invalidsize2");
			exit();
		}
		else if (invalidPhotoTypeTwo($type2, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype2");
			exit();
		} else{
			addTenderTwo($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1, $photo2);
		}
	}

	else if($countfiles === 3) {
		if (invalidPhotoSizeOne($size1) !== false) {
			header("location: ../add.php?error=invalidsize1");
			exit();
		}
		else if (invalidPhotoTypeOne($type1, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype1");
			exit();
		} 
		else if (invalidPhotoSizeTwo($size2) !== false) {
			header("location: ../add.php?error=invalidsize2");
			exit();
		}
		else if (invalidPhotoTypeTwo($type2, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype2");
			exit();
		} 
		else if (invalidPhotoSizeThree($size3) !== false) {
			header("location: ../add.php?error=invalidsize3");
			exit();
		} 
		else if (invalidPhotoTypeThree($type3, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype3");
			exit();
		} 
		else {
			addTenderThree($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1, $photo2, $photo3);
		}
	}

	else if($countfiles === 4) {
		if (invalidPhotoSizeOne($size1) !== false) {
			header("location: ../add.php?error=invalidsize1");
			exit();
		}
		else if (invalidPhotoTypeOne($type1, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype1");
			exit();
		} 
		else if (invalidPhotoSizeTwo($size2) !== false) {
			header("location: ../add.php?error=invalidsize2");
			exit();
		}
		else if (invalidPhotoTypeTwo($type2, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype2");
			exit();
		} 
		else if (invalidPhotoSizeThree($size3) !== false) {
			header("location: ../add.php?error=invalidsize3");
			exit();
		} 
		else if (invalidPhotoTypeThree($type3, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype3");
			exit();
		} 
		else if (invalidPhotoSizeFour($size4) !== false) {
			header("location: ../add.php?error=invalidsize4");
			exit();
		} 
		else if (invalidPhotoTypeFour($type4, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype4");
			exit();
		}
		else {
			addTenderFour($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1, $photo2, $photo3, $photo4);
		}
	}

	else if($countfiles === 5) {
		if (invalidPhotoSizeOne($size1) !== false) {
			header("location: ../add.php?error=invalidsize1");
			exit();
		}
		else if (invalidPhotoTypeOne($type1, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype1");
			exit();
		} 
		else if (invalidPhotoSizeTwo($size2) !== false) {
			header("location: ../add.php?error=invalidsize2");
			exit();
		}
		else if (invalidPhotoTypeTwo($type2, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype2");
			exit();
		} 
		else if (invalidPhotoSizeThree($size3) !== false) {
			header("location: ../add.php?error=invalidsize3");
			exit();
		} 
		else if (invalidPhotoTypeThree($type3, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype3");
			exit();
		} 
		else if (invalidPhotoSizeFour($size4) !== false) {
			header("location: ../add.php?error=invalidsize4");
			exit();
		} 
		else if (invalidPhotoTypeFour($type4, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype4");
			exit();
		}
		else if (invalidPhotoSizeFive($size5) !== false) {
			header("location: ../add.php?error=invalidsize5");
			exit();
		} 
		else if (invalidPhotoTypeFive($type5, $allowed) !== false) {
			header("location: ../add.php?error=invalidtype5");
			exit();
		}
		else {
			addTenderFive($conn, $owner_id, $title, $category, $subcategory, $item_condition, $description, $start_price, $duration, $min_price, $end_price, $delivery, $voivodeship, $city, $photo1, $photo2, $photo3, $photo4, $photo5);
		}
	}

	if(limitExceeded($countfiles) !== false) {
		header("location: ../add.php?error=limitexceeded");
		exit();
	}

}

else {
	header("location: ../index.php");
	exit();
}
?>