<?php
session_start();
include 'server/connection.php';

$q = 'SELECT * FROM admin';
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
$_SESSION['foto'] = $row['foto'];

$tittle = 'User';
include 'layout/header.php';
?>
<main>
    <div class="container menu-list mt-5">
        <div class="d-flex row ">
            <div class="col-md-6 mt-3">
                <h1 class="fs-2">User Akun</h1>
                <img class="d-absolute rounded-circle m-20 py-4" src="images/<?= $row['foto'] ?>" alt="<?= $row['nama'] ?>.jpg" style="width: 250px;">
            </div>
            <div class="content col-md-6 fs-5">
                <form method="post" action="controller/updateUser.php" enctype="multipart/form-data">
                    <div>
                        <p>Nama:</p>
                        <input type="text" name="nama" class="form-control my-3" value="<?= $row['nama'] ?>" required>
                    </div>
                    <div>
                        <p>Umur:</p>
                        <input type="text" name="umur" class="form-control my-3" value="<?= $row['umur'] ?>" required>
                    </div>
                    <div>
                        <p>Jenis Kelamin:</p>
                        <label class="form-check-label form-control my-3">
                            <input type="radio" name="kelamin" value="Laki - laki" required <?php
                                                                                            if ($row['kelamin'] == 'Laki - laki') {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>> Laki-laki
                        </label>
                        <!-- form-control my-3 -->
                        <label class="form-check-label form-control my-3">
                            <input type="radio" name="kelamin" value="Perempuan" required <?php
                                                                                            if ($row['kelamin'] == 'Perempuan') {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>> Perempuan
                        </label>
                    </div>
                    <div>
                        <p>Foto Profil:</p>
                        <input type="file" name="foto" class="form-control my-3">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary btn-success mt-3" name="up" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include 'layout/footer.php';
?>