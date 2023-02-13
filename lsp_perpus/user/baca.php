<?php
include_once('../class/pesan.php');
// $id = $_GET["id"];

$pesan = new pesan;
$data_pesan = $pesan->find($_GET["id"]);
// echo $data_pesan["judul_pesan"];
// return exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Pesan</title>
</head>
<body>
    <?php include('../sidebar.php'); ?>
    <div class="baca_pesan">
        <h3>Pesan</h3>
        <a href="pesan.php">Kembali</a>
        <table border="1">
            <tr>
                <th>Judul Pesan</th>
                <td><?= $data_pesan["judul"]?></td>
            </tr>
            <tr>
                <th>Isi Pesan</th>
                <td><?= $data_pesan["isi"]?></td>
            </tr>
        </table>
    </div>
</body>
</html>