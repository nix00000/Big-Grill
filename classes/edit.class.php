<?php


class Edit extends Dbh
{
  public $conn;
  public function __construct(){
    $this->conn = parent::connect();
  }

  public function products(){
    $sql = 'SELECT * FROM products ORDER BY category ASC';
    $stmt = $this->conn->query($sql);
    $row = $stmt->fetch_all(MYSQLI_ASSOC);
    return $row;

  }

  // Menu edit
  public function addNew($cat,$name,$price,$imgPath,$descr){
    $sql = 'INSERT INTO products (category,name,price,image,description) VALUES (?,?,?,?,?)';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssdss",$cat,$name,$price,$imgPath,$descr);

    if (!$stmt->execute()) {
      return -1;
    }else {
      return 0;
    }

  }


  public function updatePop($name){
    $sql = 'UPDATE products SET popular = "popular" WHERE name = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s",$name);
    if (!$stmt->execute()) {
      return -1;
    }else {
      return 0;
    }
  }

  public function updateDepop($name){
    $sql = 'UPDATE products SET popular = "standard" WHERE name = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s",$name);
    if (!$stmt->execute()) {
      return -1;
    }else {
      return 0;
    }
  }

  public function updateDescr($name,$newDesc){
    $sql = 'UPDATE products SET description = ? WHERE name = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss",$newDesc,$name);
    if (!$stmt->execute()) {
      return -1;
    }else {
      return 0;
    }
  }

  public function delete($name){
    $sql = 'DELETE FROM products WHERE name = ?';
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s",$name);
    if (!$stmt->execute()) {
      return -1;
    }else {
      return 0;
    }

  }

}
