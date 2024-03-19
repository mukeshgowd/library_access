<?php
session_start();

define("ROOT",$_SERVER['DOCUMENT_ROOT']);


$servername = "localhost";
$username = "root";
$password = "";
$db = "library_db";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

?>