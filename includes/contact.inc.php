<?php

if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $msg = $_POST['msg'];

  $toEmail = "john.dollarsign@protonmail.com";
  $subject = "asffd";
  $header = "From: ".$name ."<".$email.">\r\n";

  // if(mail($toEmail, $subject, $msg, $header)) {
	//     echo "Your contact information is received successfully.";
	//   }
  header("Location:../contact");

}else{
  header("Location:../contact");

}
?>
