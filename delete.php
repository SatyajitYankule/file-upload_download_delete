<?php
include 'dbcon.php';

$id = $_GET['id'];

$deleteQuery = "DELETE FROM items WHERE id = '$id'";
$deleteQueryResult = mysqli_query($conn, $deleteQuery);

if($deleteQueryResult){
    header("location:index.php"); 
}



?>