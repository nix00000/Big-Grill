<?php

class Jobs extends Dbh
{

  public $conn;
  public function __construct(){
    $this->conn = parent::connect();
  }

  public function getjobs(){
    $sql = 'SELECT * FROM jobs ORDER BY closed ASC';
    $stmt = $this->conn->query($sql);
    if (!$row = $stmt->fetch_all(MYSQLI_ASSOC)) {
      $stmt->close();
      return -1;
    }else{
      $stmt->close();
      return $row;
    }

  }

  public function addJob($title,$sum,$desc,$req){
    $title = $this->conn->real_escape_string($title);
    $sum = $this->conn->real_escape_string($sum);
    $desc = $this->conn->real_escape_string($desc);
    $req = $this->conn->real_escape_string($req);

    $date = date("Y-m-d");
    $sql = 'INSERT INTO jobs (title,summary,description,requirements,uploaded)
    VALUES (?,?,?,?,?)';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sssss", $title,$sum,$desc,$req,$date);
    if (!$stmt->execute()){
      return -1;
    }else {
      return 0;
    }
  }

  public function oneJob($name){
    $sql = 'SELECT * FROM jobs WHERE title = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s",$name);
    $stmt->execute();

    $job = $stmt->get_result();
    $row = $job->fetch_assoc();
    if (!$row) {
      $stmt->close();
      return -1;
    }else{
      $stmt->close();
      return $row;
    }
  }


  public function oneJobById($id){
    $sql = 'SELECT * FROM jobs WHERE job_id = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    $job = $stmt->get_result();
    $row = $job->fetch_assoc();
    if (!$row) {
      $stmt->close();
      return -1;
    }else{
      $stmt->close();
      return $row;
    }
  }

  public function deleteJob($id){
    $sql = 'DELETE FROM jobs WHERE job_id = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$id);
    if (!$stmt->execute()) {
      return -1;
    }else{
      return 0;
    }
  }

  public function closeJob($id){
    $sql = 'UPDATE jobs SET closed = 1 WHERE job_id = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$id);
    if (!$stmt->execute()) {
      return -1;
    }else{
      return 0;
    }
  }

  public function application($jobid,$name,$dob,$email,$phone,$cv,$motive){
    $date = date("Y-m-d", strtotime($dob));

    $sql = 'INSERT INTO applicants (jobid,name,dob,email,phone,CVs,MotLet)
    VALUES (?,?,?,?,?,?,?)';

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("issssss",$jobid,$name,$date,$email,$phone,$cv,$motive);
    if(!$stmt->execute()){
      return -1;
    }else{
      return 0;
    }
  }


  public function jobApplicants($jobid){
    $sql = 'SELECT * FROM applicants WHERE jobid = ?';

    $stmt= $this->conn->prepare($sql);
    $stmt->bind_param("i",$jobid);
    $stmt->execute();
    $data = $stmt->get_result();
    $row = $data->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $row;

  }


  public function editDescr($id, $desc){
    $desc = strip_tags($desc);
    $sql = 'UPDATE jobs SET description = ? WHERE job_id =?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("si", $desc ,$id);
    if(!$stmt->execute()){
      return -1;
    }else{
      return 0;
    }
  }

    public function editReq($id, $req){
      $req = strip_tags($req);
      $sql = 'UPDATE jobs SET requirements = ? WHERE job_id =?';
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("si", $req ,$id);
      if(!$stmt->execute()){
        return -1;
      }else{
        return 0;
      }


  }
}
