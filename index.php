<?php

include 'server/connection.php';
session_start();

$q_produk = 'SELECT * FROM product';
$r_produk = mysqli_query($conn, $q_produk);

$tittle = 'HomePage';
include 'layout/header.php';
?>
<main>
    <div class="container menu-list mt-5">
        <h1 class="fs-2 welcoming py-3">Daftar Produk</h1>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($r_produk)) : ?>
                <div class="col-lg-4 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div class="product">
                        <img src="images/<?= $row['picture'] ?>" alt="<?= $row['picture'] ?>">
                    </div>
                    <div class="judul pt-4 pb-1" name="nama_produk"><?= $row['product_name'] ?></div>
                    <div class="price" name="price">Rp <?= number_format($row['price']) ?>,00</div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
<?php
include 'layout/footer.php';
?>