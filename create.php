<?php
$tittle = 'Tambah Produk';
include 'layout/header.php';
?>
<div class="container w-75">
    <h1 class="my-5 text-center">Create Product</h1>
    <form method="post" action="controller/create.php" enctype="multipart/form-data">
        <div class="container">
            <div>
                <h5>Masukan nama produk:</h5>
                <input type="text" name="product_name" class="form-control my-3" placeholder="Nama Produk" required>
            </div>
            <div>
                <h5>Masukan harga:</h5>
                <input type="text" name="price" class="form-control my-3" placeholder="Harga Produk" required>
            </div>
            <div>
                <h5>Foto Produk:</h5>
                <input type="file" name="picture" class="form-control my-3" required>
            </div>
            <div>
                <input type="submit" class="btn btn-primary btn-success mt-3" name="up" value="Tambah Produk">
            </div>
        </div>
    </form>
</div>
<?php
include 'layout/footer.php';
?>