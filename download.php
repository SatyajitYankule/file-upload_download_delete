<?php
include 'dbcon.php';

$id = $_GET['id'];

$selectDownloadQuery = "SELECT * FROM items WHERE id = '$id'";
$selectDownloadQueryResult = mysqli_query($conn, $selectDownloadQuery);

if ($count = mysqli_num_rows($selectDownloadQueryResult) > 0) {
    $rows = mysqli_fetch_assoc($selectDownloadQueryResult);
    $image = $rows['image'];
    $file = 'upload/' . $image;

    if (headers_sent()) {
        echo 'HTTP Header alrady sent';
    } else {
        ob_end_clean();
        header("Content-Type: application/image");
        // header('Content-Disposition: attachment; filename=\"".basename($file). '\"");
        header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
        readfile($file);
        exit;
    }
    echo "<script> window.close(); </script>";
} else {
    echo "File not found";
}
