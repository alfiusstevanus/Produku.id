<?php
session_start();
include('server/connection.php');
$id = $_GET["id"];
$sql = "Select * from product WHERE product_id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['product_id'];
    $_SESSION['nama'] = $row['product_name'];
    $_SESSION['harga'] = $row['price'];
    $_SESSION['photo'] = $row['picture'];
}
$tittle = 'Update Produk';
include 'layout/header.php';
?>
<div class="container w-75">
    <h1 class="my-5 text-center">Update Product</h1>
    <form method="post" action="controller/update.php" enctype="multipart/form-data">
        <div class="container">
            <input type="hidden" name="size" value="1000000">
            <div>
                <h5>Masukan nama produk:</h5>
                <input type="text" name="product_name" class="form-control my-3" value="<?= $_SESSION['nama'] ?>" required>
            </div>
            <div>
                <h5>Masukan harga:</h5>
                <input type="text" name="price" class="form-control my-3" value="<?= $_SESSION['harga'] ?>" required>
            </div>
            <div>
                <h5>Foto Produk:</h5>
                <input type="file" name="picture" class="form-control my-3">
            </div>
            <div>
                <input type="submit" class="btn btn-primary btn-success mt-3" value="Simpan Produk">
            </div>
        </div>
    </form>
</div>
<?php
include 'layout/footer.php';
?>