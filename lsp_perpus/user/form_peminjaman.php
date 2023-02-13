<?php
include_once("../class/peminjaman.php");
include_once("../class/buku.php");
include_once("../class/user.php");
session_start();

$user = new user;
$data_user = $user->find(2);

$buku = new buku;
$data_buku = $buku->all();

//  var_dump($data_user);

if(isset($_POST["submit"])){
    $data = [
        "id_user" => $_POST["id_user"],
        "id_buku" => $_POST["id_buku"],
        "tanggal_peminjaman" => $_POST["tanggal_peminjaman"],
        "kondisi_buku_saat_dipinjam" => $_POST["kondisi_buku_saat_dipinjam"],
    ];
    
    $peminjaman = new peminjaman;
    $peminjaman->create($data);
    header("location: peminjaman.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <div>
                <label>Nama Anggota</label>
                <input type="text" disabled value="<?= $data_user["fullname"] ?>">
                <input type="hidden" name="id_user" value="<?= $data_user["id"] ?>">    
            </div>

            <div>
                <label>Judul Buku</label>
                <select name="id_buku">
                    <option disabled selected >Pilih Opsi</option>
                    <?php foreach($data_buku as $b) {?>
                    <option value="<?= $b["id"] ?>"
                    <?php
                    if(isset($_GET['id_buku'])){
                        if($_GET['id_buku'] == $b['id']){
                            echo "selected";
                        }else{
                            echo "";
                        }
                    }else{
                        echo "";
                    }
                    ?>
                    
                    
                    ><?= $b["judul"]?> | <?= $b["pengarang"]?></option>

                    <?php } ?>
                </select>   

            </div>

            <div>
                <label>Tanggal Peminjaman</label>
                <input type="date" name="tanggal_peminjaman" value="<?= date("Y-m-d") ?>">
            </div>

            <div>
                <label>Kondisi Buku Saat Dipinjam</label>
                <select name="kondisi_buku_saat_dipinjam">
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