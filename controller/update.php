<?php
session_start();
include '../server/connection.php';
$productName = $_POST['product_name'];
$price = $_POST['price'];
$id = $_SESSION['id'];

$temp = $_FILES['picture']['tmp_name'];
$picture = str_replace(' ', '-', $productName) . ".jpg";
$path = '../images/' . $_SESSION['photo'];

if (!empty($_FILES['picture']['tmp_name'])) {
    if (file_exists($path)) {
        unlink($path);
    }
    move_uploaded_file($temp, "../images/" . $picture);
} else {
    $picture =  $_SESSION['photo'];
}

$query = "UPDATE product SET product_name = '$productName', price = $price, picture = '$picture' WHERE product_id = '$id'";
mysqli_query($conn, $query);

header("location:../kelola.php");
die();
