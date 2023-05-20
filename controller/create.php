<?php
include '../server/connection.php';

$productName = $_POST['product_name'];
$price = $_POST['price'];

if (!empty($_FILES['picture']['tmp_name'])) {
    $temp = $_FILES['picture']['tmp_name'];
    $picture = str_replace(' ', '-', $productName) . ".jpg";
    move_uploaded_file($temp, "../images/" . $picture);
} else {
    $picture = str_replace(' ', '-', $productName) . ".jpg";
}

$query = "INSERT INTO product VALUES('','$productName','$price','$picture')";

mysqli_query($conn, $query);

header("location:../kelola.php");
die();
