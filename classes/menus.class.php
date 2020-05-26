<?php

class Menus extends Dbh
{
  public $conn;
  public function __construct(){
    $this->conn = parent::connect();
  }
  public function getAll(){
    $sql = 'SELECT * FROM products';
    $stmt = $this->conn->query($sql);
    $data = $stmt->fetch_all(MYSQLI_ASSOC);
    return $data;
  }

  public function order($uid,$ad,$postc,$city,$phone,$email,$rems){
    $date = date("Y-m-d H:i:s");
    if ($uid == NULL) {
      $sql = 'INSERT INTO orders (address,post_code,city,phone_number,email,remarks,dates) VALUES (?,?,?,?,?,?,?)';
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("sssssss",$ad,$postc,$city,$phone,$email,$rems,$date);
    }else{
      $uids = intval($uid);
      $sql = 'INSERT INTO orders (userid,address,post_code,city,phone_number,email,remarks,dates) VALUES (?,?,?,?,?,?,?,?)';
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("isssssss",$uids,$ad,$postc,$city,$phone,$email,$rems,$date);
    }

    if(!$stmt->execute()){
      return -1;
    }else{
      return 0;
    }

  }

  public function getProdId($ad,$em){
    $sql = 'SELECT order_id FROM orders WHERE address = ? and email = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss",$ad,$em);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->fetch();
    return $id;
  }
  public function orderDetails($ordid ,$prodid,$name,$qty,$price){
    $sql = 'INSERT INTO order_details (orderid,prodid,prod_name,qty,tot_price)
    VALUES (?,?,?,?,?)';

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("iisid",intval($ordid),$prodid, $name,intval($qty),$price);
    if (!$stmt->execute()) {
      return -1;
    }else{
      return 0;
    }

  }

  public function allOrders(){
    $sql = 'SELECT order_id,address,post_code,email,phone_number,prodid,prod_name,qty,tot_price,paid,sent,remarks,dates
    FROM orders
    INNER JOIN order_details
    ON order_details.orderid = orders.order_id
    ORDER BY order_id DESC';

    $stmt = $this->conn->query($sql);
    $row = $stmt->fetch_all(MYSQLI_ASSOC);
    return $row;
  }


  public function updateSent($order){
    $sql = 'UPDATE orders SET sent = 1 WHERE order_id = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$order);
    if (!$stmt->execute()) {
      $stmt->close();
      return "Failed to update";
    }else{
      $stmt->close();
      return "Update was successful";
    }

  }
  public function deleteOrder($order){
    $sql = 'DELETE FROM orders WHERE order_id = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$order);
    if (!$stmt->execute()) {
      $stmt->close();
      return "Failed to Delete";
    }else{
      $stmt->close();
      return "Successfully deleted";
    }
  }


  public function checkCart($name,$price){
    $sql = 'SELECT * FROM products WHERE name = ? AND price = ?';
    $stmt= $this->conn->prepare($sql);
    $stmt->bind_param("sd",$name,$price);
    $stmt->execute();

    $data = $stmt->get_result();

    if ($row = $data->fetch_assoc()) {
      return $row;
    }else{
      return -1;
    }


  }
}
