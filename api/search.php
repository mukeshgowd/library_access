<?php
require_once('../includes/db.php');



$book_title = $_POST["book_title"];
$book_author_name = $_POST["book_author_name"];
$book_category_name = $_POST["book_category_name"];

$con = new db();
// $data = $con->searchData($book_title, $book_author_name, $book_category_name);

if(!isset($_SESSION["logged_in"])){ 
    $data = $con->searchData($book_title, $book_title, $book_title,"");
    echo json_encode($data);

}else{
    $data = $con->searchData($book_title, $book_title, $book_title, $_SESSION["uid"]);
    echo json_encode($data);

}

?>