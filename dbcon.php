<?php 
$DBHOST = "localhost";
$DBUSER = "root";
$DBPASS = "";
$DBNAME = "portfolio_file_upload_download";

$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if(!$conn){
    echo "Connection failed";
}

?>



<!-- 
$DBHOST = "sql208.infinityfree.com";
$DBUSER = "if0_36311774";
$DBPASS = "HFdxydzu1eu09YX";
$DBNAME = "if0_36311774_fileUpload";

$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if(!$conn){
    echo "Connection failed";
} -->
