<?php
require_once '..\classes\dbh.class.php';
require_once '..\classes\jobs.class.php';

if (!isset($_POST['token'])) {
  header("Location:../index");
}

$jobs = new Jobs;
$res = $jobs->getJobs();

if (isset($_POST['menu'])) {

  if ($res !== -1) {
    $count = 0;
    foreach ($res as $r) {
      if ($r['closed'] != 1) {
        $count += 1;
        $date = explode(" ",$r['uploaded']);
        $date[0] = date("d/m/Y", strtotime($date[0]));
        $status = "Open";

        echo '
        <div class="jobs">
          <h2 class = "job-title">'.$r['title'].'</h2>
          <h4>'.$r['summary'].'</h4>
          <p>'.$date[0].'</p>
          <p> Status : <b>'.$status.'</b></p>
        </div>
        ';
      }
    }
    if ($count == 0) {
      echo "Sorry there aren't any available<br>positions at the moment...";
    }

  }else{
    echo "Sorry there aren't any available<br>positions at the moment...";
  }
}else if(isset($_POST['load'])){
  $job = $_POST['load'];
  $exist = $jobs->oneJob($job);
  $reqs = explode(",",$exist['requirements']);
  if ($exist == -1) {
    echo "Error, no job found";
  }else{
    echo '
    <div class="selected-job">
      <h2>'.$exist['title'].'</h2>
      <h4>'.$exist['description'].'</h4>
      <p>';

      foreach ($reqs as $k) {
        $trimed = trim($k,'\r\n');
        echo "~".$trimed."<br>";
        }

      echo '</p>
      <button class="apply" type="button" name="button">Apply Now</button>
      <button class="back" type="button" name="button">Other Positions</button>
    </div>
    ';
  }

}else if(isset($_POST['apply']) && isset($_POST['job'])){
  $job = $_POST['job'];
  $exist = $jobs->oneJob($job);
  if ($exist == -1) {
    echo "<p>Error</p>";
    echo '<button class="back" type="button" name="button">Other Positions</button>';
  }else {
    echo '
    <div class="Application">
    <h2>'.$exist['title'].'</h2>
      <form action="includes/apply.inc.php" method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <td><label for="name">Name:</label> </td>
            <td><input type="text" name="name" required></td>
          </tr>
          <tr>
            <td><label for="dob" >DOB:</label></td>
            <td><input type="date" name="dob" required></td>
          </tr>
          <tr>
            <td><label for="email">Email: </label></td>
            <td><input type="text" name="email" required></td>
          </tr>
          <tr>
            <td><label for="phone" >Phone: </label></td>
            <td><input type="text" name="phone" required></td>
          </tr>
          <tr>
            <td  style="vertical-align:top"><label for="cover"> Cover Letter: </label></td>
            <td><textarea name="cover" rows="8" cols="80" required></textarea></td>
          </tr>
          <tr>
            <td><label for="CV" name>Upload CV: </label></td>
            <td><input type="file" name="CV" required></td>
          </tr>
        </table>
        <input type="hidden" name="job" value = "'.$exist['job_id'].'">
        <button class = "submit-applic" type="submit" name="submit-application">Submit</button>
        <button class="back" type="button" name="button">Other Positions</button>
      </form>
    </div>
    ';
  }

}
