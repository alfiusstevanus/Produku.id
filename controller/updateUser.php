<?php
session_start();
include '../server/connection.php';
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$kelamin = $_POST['kelamin'];

$temp = $_FILES['foto']['tmp_name'];
$picture = str_replace(' ', '-', $nama) . ".jpg";
$path = '../images/' . $_SESSION['foto'];

if (!empty($_FILES['foto']['tmp_name'])) {
    if (file_exists($path)) {
        unlink($path);
    }
    move_uploaded_file($temp, "../images/" . $picture);
} else {
    $picture =  $_SESSION['foto'];
}

$query = "UPDATE admin SET nama = '$nama', umur = $umur, kelamin = '$kelamin', foto = '$picture' WHERE id = 1";
if (mysqli_query($conn, $query)) {
    header("location:../kelola.php");
}

// header("location:../kelola.php");
die();
