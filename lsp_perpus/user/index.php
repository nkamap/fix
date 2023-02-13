<?php 
include ("../connect.php");
include_once("../class/buku.php");

$sql = "SELECT * FROM user WHERE id";
$result = $koneksi->query($sql);
$data_user = $result->fetch_assoc();

$sql2 = "SELECT * FROM pemberitahuan WHERE status = 'aktif'";
$result2 = $koneksi->query($sql2);
$data_pemberitahuan = $result2->fetch_all(MYSQLI_ASSOC);

$buku = new buku;
$data_buku = $buku->all();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>LSP</title>
</head>
<body>
<h1> E-PERPUS</h1>

    <div class="sidebar">
        <!-- <?= $data_user["fullname"] ?>
        <?= $data_user["role"] ?> -->
        
        <ul>
            <li> <a href="index.php">Dashboard</a></li>
            <li> <a href="peminjaman.php">Peminjaman Buku</a></li>
            <li> <a href="pengembalian.php">Pengembalian Buku</a></li>
            <li> <a href="pesan.php">Pesan</a></li>
            <li> <a href="profil.php">Profil Saya</a></li>
            <li> <a href="../logout.php">Keluar</a></li>
        </ul>

    </div>

    <!-- <div class="pemberitahuan">
        <?php 
            foreach($data_pemberitahuan as $pemberitahuan){
                ?>
                    <div class="alert alert-info">
                        <span><?= $pemberitahuan["isi"]?></span>
                    </div>
                <?php
            }
        ?>
        
    </div> -->

    <div class="buku">
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>

            <?php 
            foreach($data_buku as $key => $b){
            ?>

            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $b["judul"] ?></td>
                <td><?= $b["pengarang"] ?></td>
                <td><?= $b["nama"] ?></td>
                <td>
                    <a href="form_peminjaman.php?id_buku=<?= $b['id'];?>">Pinjam</a>
            </td>
            </tr>

            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>