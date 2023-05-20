<?php
include 'server/connection.php';
$q = 'SELECT * FROM admin';
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['up'])) {
    $path = "images/" . basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $product_name = $_POST['product_name'];
    $harga = $_POST['harga'];
    //upload gambar
    $q = "INSERT INTO product VALUES (null,'$product_name', '$harga' , '$image')";
    mysqli_query($conn, $q);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        echo "<script> alert('Produk berhasil di upload.');
        window.location.href='kelola.php';

        </script>";
    }
}

$q_produk = 'SELECT * FROM product';
$r_produk = mysqli_query($conn, $q_produk);

$tittle = 'Kelola Produk';
include 'layout/header.php';
?>

<div class="container menu-list mt-5">
    <div class="border-3 mb-3 border-bottom border-dark welcoming py-3">
        <div class="d-flex row align-items-center">
            <h1 class="fs-2 mb-3">User Akun</h1>

            <div class="content col-md-6 mb-3">
                <img class="d-absolute rounded-circle m-20 py-4" src="images/<?= $row['foto'] ?>" alt="<?= $row['nama'] ?>.jpg" style="width: 250px;">
            </div>
            <div class="content col-md-6">
                <h6>Nama:</h6>
                <p><?= $row['nama'] ?></p>
                <h6>Umur:</h6>
                <p><?= $row['umur'] ?></p>
                <h6>Jenis kelamin:</h6>
                <p class=""><?= $row['kelamin'] ?></p>
                <a class="btn btn-sm btn-primary bg-success border-0 " href="user.php" role="button">
                    Edit Akun
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex row align-items-center">
        <div class="col-md-4 ">
            <h1 class="fs-2 welcoming py-3">Kelola Product</h1>
        </div>
        <div class="col-md-4 ">
            <a class="btn btn-sm btn-primary bg-success border-0 float-right" href="create.php" role="button">
                Add Product
            </a>
        </div>
    </div>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($r_produk)) : ?>
            <div class="col-lg-4 col-sm-6 product-item my-3">
                <input type="hidden" name="size" value="1000000">
                <div class="product">
                    <img src="images/<?= $row['picture'] ?>" alt="<?= $row['picture'] ?>">
                </div>
                <div>
                    <input type="text" name="product_name" class="form-control text-center border-0 my-2" value="<?= $row['product_name'] ?>" readonly>
                </div>
                <div>
                    <input type="text" name="harga" class="form-control text-center border-0 my-2 max-w" value="Rp. <?= number_format($row['price']) ?>,00" readonly>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4">
                        <a class="btn btn-sm btn-primary bg-success border-0" href="update.php?id=<?= $row['product_id'] ?>" role="button">Edit</a>
                    </div>
                    <div class="col-lg-4">
                        <a class="btn btn-sm btn-primary bg-danger border-0" href="controller/delete.php?id=<?= $row['product_id'] ?>&nama=<?= $row['product_name'] ?>" role="button" onclick="return confirm('Anda yakin akan menghapus produk <?= $row['product_name'] ?>?')">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php
include 'layout/footer.php';
?>