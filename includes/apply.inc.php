<?php
require_once '..\classes\dbh.class.php';
require_once '..\classes\jobs.class.php';

if (!isset($_POST['submit-application'])) {
  header("Location: ../jobs.php");
}

$job = new Jobs;
if (isset($_POST['name']) && isset($_POST['dob']) && isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['cover'])) {
 if ($_POST['name'] != "" && $_POST['dob'] != "" && $_POST['email'] != "" && $_POST['phone'] != "" && $_POST['cover'] != "") {
   $jobid = strip_tags($_POST['job']);
   $name = strip_tags($_POST['name']);
   $dob = strip_tags($_POST['dob']);
   $email = strip_tags($_POST['email']);
   $phone = strip_tags($_POST['phone']);
   $cover = strip_tags($_POST['cover']);

   $dir_db = "CVs/";

   $dir = "../CVs/";
   $file = $dir.basename($_FILES['CV']['name']);
   $file_upload = $dir_db.basename($_FILES['CV']['name']);
   $upload = 1;

   $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

   if(file_exists($file)){
     $res = $job->application($jobid,$name,$dob,$email,$phone,$file_upload,$cover);
     if ($res == -1) {
       header("Location:../job_status.php?status=failed");
     }else{
       header("Location:../job_status.php?status=success");
       exit();
     }

   }

   if ($_FILES['CV']["size"] > 200000) {
     header("Location:../job_status.php?status=failed");
     exit();
   }

   if ($type != "docx" && $type != "doc" && $type != "pdf") {
     header("Location:../job_status.php?status=failed");
     exit();
   }

   if (move_uploaded_file($_FILES['CV']['tmp_name'], $file)) {
     $res = $job->application($jobid,$name,$dob,$email,$phone,$file_upload,$cover);
     if ($res == -1) {
       header("Location:../job_status.php?status=failed");
     }else{
       header("Location:../job_status.php?status=success");
     }

   }else{
     header("Location:../job_status.php?status=failed");
   }



 }

}
