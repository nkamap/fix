<?php 

include_once('../class/user.php');
include_once('../class/buku.php');
include_once('../class/peminjaman.php');

$user = new user;
$data_user = $user->find(1);

$anggota = new user;
$data_anggota = $anggota->getanggota(1);

$buku = new buku;
$data_buku = $buku->all();

$peminjaman = new peminjaman;
$data_peminjaman = $peminjaman->getpeminjaman();

$pengembalian = new peminjaman;
$data_pengembalian = $pengembalian->getpengembalian();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <?php include("sidebar.php")?>
    <table border="1">
        <tr>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Peminjaman</th>
            <th>Pengembalian</th>
</tr>
<tr>
    <td><?= count($data_anggota)?></td>
    <td><?= count($data_buku)?></td>
    <td><?= count($data_peminjaman)?></td>
    <td><?= count($data_pengembalian)?></td>
</tr>
</table>
</body>
</html>