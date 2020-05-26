<?php
require_once '..\classes\dbh.class.php';
require_once '..\classes\jobs.class.php';

$jobs = new Jobs;

if (!isset($_POST['test'])) {
  echo "here";
  // header("Location:../index.php");
}

if (isset($_POST['jobs'])) {
  $res = $jobs->getJobs();
  if ($res != -1) {
    foreach ($res as $r) {
      $date = explode(" ",$r['uploaded']);
      $date[0] = date("d/m/Y", strtotime($date[0]));
      $req = explode(",",$r['requirements']);

      if ($r['closed'] == 1) {
        $status = "Closed";
      }else{
        $status = "Open";
      }

      echo '
      <div class="jobs-item">
        <h4 class = "job-title">'.$r['title'].'</h2>
        <p>'.$r['summary'].'</p>
        <p>'.$date[0].'</p>
        <p>Status : '.$status.'</p>
        <input type="hidden" value="'.$r['job_id'].'">
        <button type="button" class = "fill-job" value="'.$r['job_id'].'">Close</button>
        <button type="button" class = "del-job" value="'.$r['job_id'].'">Delete</button>
      </div>
      ';
      }
    }else {
      echo "Something went wrong...";
    }
}else if (isset($_POST['id'])){
    $id = $_POST['id'];
    $res = $jobs->deleteJob($id);

    if ($res == -1) {
      echo "Failed to delete";
    }else{
      echo "Job deleted successfully";
    }
}else if (isset($_POST['jid'])){
    $id = $_POST['jid'];
    $res = $jobs->closeJob($id);

    if ($res == -1) {
      echo "Failed to close";
    }else{
      echo "Job closed successfully";
    }
}else if(isset($_POST['enlarge'])){
  $id = $_POST['enlarge'];
  $res = $jobs->oneJobById($id);

  if ($res == -1) {
    echo 'Error, Job not found';
  }else{

    $reqs = explode(",",$res['requirements']);
    $date = explode(" ",$res['uploaded']);
    $date = date("d-m-Y", strtotime($date[0]));

    if ($res['closed'] == 1) {
      $status = "Closed";
    }else{
      $status = "Open";
    }

    $desc = str_replace('\r\n',"",$res['description']);

    echo '
    <div class="selected-job">
      <h2>'.$res['title'].'</h2>
      <h4>'.$desc.'</h4>
      <textarea class = "dscr-area" name="descr" rows="3" cols="55"></textarea><br>
      <button class = "ed-descr" type="button">Edit Description</button>
      <p>';


      foreach ($reqs as $k) {
        $trimed = trim($k,'\r\n');
        echo "~".$trimed."<br>";
        }


      echo '</p>
      <textarea class = "req-area" name="descr" rows="3" cols="55" placeholder="Insert requirements separated by commas"></textarea><br>
      <button class = "ed-req" type="button" >Edit Requirements</button>
      <p>Date : '.$date.'</p>
      <p>Status : '.$status.'</p>
      <input class = "secret" type="hidden" value ="'.$res['job_id'].'">
    </div>
    ';
  }


}else if (isset($_POST['appl'])){
  $id = $_POST['appl'];
  $res = $jobs->jobApplicants($id);

  if (!$res) {
    echo "<h4 class='nothing'>No applicants</h4>";
  }else{
    foreach ($res as $r) {

      $date = date("d-m-Y", strtotime($r['dob']));
      echo '
      <div class="appl">
        <h4>'.$r['name'].' || '.$date.'</h4>
        <p>'.$r['email'].' / '.$r['phone'].' / <a href="'.$r['CVs'].'">CV</a></p>
        <p>'.$r['MotLet'].'</p>
      </div>
      ';
    }

  }




}else if (isset($_POST['action'])){
  $ch = $_POST['action'];
  if ($ch == 0) {
    $id = $_POST['editid'];
    $desc = $_POST['descr'];
    $res = $jobs->editDescr($id, $desc);

    if ($res != -1) {
      echo "Description updated successfully";
    }else{
      echo "Something went wrong...";

    }
  }else{
    $id = $_POST['editid'];
    $req = $_POST['req'];
    $res = $jobs->editReq($id, $req);

    if ($res != -1) {
      echo "Requirements updated successfully";
    }else{
      echo "Something went wrong...";

    }
  }
}
