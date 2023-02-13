<?php
include_once("../class/peminjaman.php");
include_once("../class/buku.php");
include_once("../class/user.php");
session_start();

$user = new user;
$data_user = $user->find(2);

$buku = new buku;
$data_buku = $buku->find($_GET['id']);

if(isset($_POST["submit"])){
    $data = [
        "tanggal_pengembalian" => $_POST["tanggal_pengembalian"],
        "kondisi_buku_saat_dikembalikan" => $_POST["kondisi_buku_saat_dikembalikan"],
    ];
    
    $pengembalian = new peminjaman;
    $submit = $pengembalian->kembalikan($data);
    header("location: pengembalian.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengembalian</title>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <input type="hidden" name="id_user" value="<?= $data_user["id"] ?>">    
            <div>
                <label>Nama Anggota</label>
                <input type="text" disabled value="<?= $data_user["fullname"] ?>">
            </div>

            <div>
                <label>Judul Buku</label>
                <input type="text" value="<?= $data_buku['judul']?>">
            </div>

            <div>
                <label>Tanggal Pengembalian</label>
                <input type="date"  name="tanggal_pengembalian" value="<?= date("Y-m-d") ?>">
            </div>

            <div>
                <label>Kondisi Buku</label>
                <select name="kondisi_buku_saat_dikembalikan">
                    <option disabled selected >Pilih Opsi</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>

            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>