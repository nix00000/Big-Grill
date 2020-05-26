<?php


require_once '..\classes\dbh.class.php';
require_once '..\classes\edit.class.php';


$up = new Edit;
$err = '';

if (isset($_POST['add-prod'])) {
  $cat = $_POST['category'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $descr = $_POST['descr'];

  $target_dir = "../product_images/";
  $path = "product_images/".$_FILES["images"]['name'];


  $target_file = $target_dir . basename($_FILES["images"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["images"]["tmp_name"]);

  if($check == false){
    $err = "not image";
    $uploadOk = 0;
  }

  if (file_exists($target_file)) {
    $res = $up->addNew($cat,$name,$price,$path,$descr);
    if ($res !== -1) {
      header("Location:../edit?success");
    }else{
      header("Location:../edit?".$err);
    }
  exit();
  }

  // Check file size
  if ($_FILES["images"]["size"] > 500000) {
    $err = "Too large";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $err = "Invalid type";
    $uploadOk = 0;
  }


if ($uploadOk == 0) {
  header("Location:../edit?err=".$err);

} else {
  if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
    $res = $up->addNew($cat,$name,$price,$path,$descr);
    if ($res !== -1) {
      header("Location:../edit?success");
    }else{
      header("Location:../edit?err=".$err);
    }
  } else {
    $err = "error uploading the file.";
    header("Location:../edit?err=".$err);
  }
}


}else{
  header("../index");
}
