<?php
include_once('../class/peminjaman.php');
include_once('../class/buku.php');

$buku = new buku;
$data_buku = $buku->all();

$peminjaman = new peminjaman;
$data_peminjaman = $peminjaman->find(2);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
</head>
<body>
    <?php include('../sidebar.php') ?>

    <div class="peminjaman">
        <h3>Buku Yang Dipinjam</h3>
        <a href="form_peminjaman.php">Tambah</a>

        <table>
            <tr>
                <th>No.</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Kondisi Buku Saat Dipinjam</th>
                <th>Aksi</th>
</tr>
<?php
foreach($data_peminjaman as $key => $p) {
    ?>

    <tr>
        <td><?=$key+1?></td>
        <td><?= $p["buku"]?></td>
        <td><?= $p["tanggal_peminjaman"]?></td>
        <td><?= $p["kondisi_buku_saat_dipinjam"]?></td>
        <td>
            <a href="form_pengembalian.php?id=<?php echo $p['id_buku'];?>">Pengembalian</a>
        </td>
</tr>
<?php
    }
    ?>
    </table>
</div>
</body>
</html>