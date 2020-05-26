<?php

class Accounts extends Dbh
{
  public $conn;
  public function __construct(){
    $this->conn = parent::connect();
  }

  public function register($name,$email,$pass){
    $name = $this->conn->real_escape_string($name);
    $email = $this->conn->real_escape_string($email);
    $pass = $this->conn->real_escape_string($pass);

    $secure = password_hash($pass,PASSWORD_DEFAULT);
    $sql = 'INSERT INTO users (name,email,password) VALUES (?,?,?)';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sss", $name,$email,$secure);
    if(!$stmt->execute()){
      return -1;
    }else{
      if (!$this->login($email,$pass)) {
        return "not logged in";
      }else{
        return array($email,$pass);
      }
      return 0;
    }

  }

  public function login($email,$pass){
    $email = $this->conn->real_escape_string($email);
    $pass = $this->conn->real_escape_string($pass);

    $sql = 'SELECT user_id,email,password,Admin FROM users WHERE email = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s",$email);
    if (!$stmt->execute()) {
      return -1;
    }else{
      $stmt->store_result();
      if ($stmt->num_rows() > 0){
        $stmt->bind_result($id,$em,$dbpass,$admin);
        $stmt->fetch();
        if (password_verify($pass,$dbpass)) {
          $_SESSION['person'] = array($id,$em,$admin);
          return array($id,$em,$dbpass);
        }else{
          return -1;
        }
      }else {
        return -1;
      }

    }
  }

  public function userInfo($id){
    $sql = 'SELECT * FROM users WHERE user_id = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $data = $stmt->get_result();
    $row = $data->fetch_assoc();
    return $row;

  }
  public function userOrders($id){
    $sql = 'SELECT order_id,address,post_code,prod_name,qty,tot_price,sent
    FROM orders
    INNER JOIN order_details
    ON order_details.orderid = orders.order_id
    WHERE orders.userid = ?';

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $data = $stmt->get_result();
    $row = $data->fetch_all(MYSQLI_ASSOC);
    return $row;
  }

  public function changePass($email,$oldPass,$pass){
    //verify
    $email = $this->conn->real_escape_string($email);
    $oldPass = $this->conn->real_escape_string($oldPass);
    $secure = password_hash($pass,PASSWORD_DEFAULT);

    $sql = 'SELECT user_id,email,password FROM users WHERE email = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s",$email);

    $response = 0;
    if (!$stmt->execute()) {
      $response = "-1";
      exit();
    }else{
      $stmt->store_result();
      if ($stmt->num_rows() > 0){
        $stmt->bind_result($id,$em,$dbpass);
        $stmt->fetch();

        if (!password_verify($oldPass,$dbpass)){
          $response = -2;
        }
        // Set New
        $sql = 'UPDATE users SET password = ? WHERE user_id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si",$secure,$id);
        if(!$stmt->execute()){
          $response = -1;
        }else{
          $response = 0;
        }

        return $response;

      }else{
        return -2;
      }

    }
  }
}
