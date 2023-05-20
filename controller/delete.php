<?php
session_start();
include '../server/connection.php';

$id = $_GET["id"];
$productName = $_GET["nama"];

//menghapus foto di folder images
$path = "../images/" . str_replace(' ', '-', $productName) . ".jpg";
if (file_exists($path)) {
    unlink($path);
}

$query = "DELETE FROM product WHERE product_id = '$id'";
if (mysqli_query($conn, $query)) {
    header("location:../kelola.php");
}
die();
