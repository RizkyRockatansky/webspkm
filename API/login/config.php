<?php
$servername = "localhost";
$username = "klikgss";
$password = "qwe-123-123";

try {
  $connection = new PDO("mysql:host=$servername;dbname=sman5semarang", $username, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>