<?php
abstract class Dbh{
  private $dbs = "localhost";
  private $dbu = 'root';
  private $dbp = '';
  private $dbn = 'biggrill';

  public static function connect() {
    $dbs = "localhost";
    $dbu = 'root';
    $dbp = '';
    $dbn = 'biggrill';
    $connection = new mysqli($dbs,$dbu,$dbp,$dbn);
    if ($connection->connect_errno) {
      echo "Failed to connect to SQL";
    }
    return $connection;

  }

  // Static method to access non static property
  // public static function why(){
  //   $f = new self();
  //   return $f->dbs;
  // }
}
