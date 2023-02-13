<?php
include_once('../class/pesan.php');

$pesan = new pesan;
$data_pesan = $pesan->findbyuserid(2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
</head>
<body>
    <?php include('../sidebar.php') ?>
    <div class="pesan">
        <h3>Pesan Masuk</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
</tr>
<?php
foreach($data_pesan as $key => $p){
    ?>
    <tr>
        <td><?= $key+1 ?></td>
        <td><?= $p["judul"]?></td>
        <td><?= $p["status"]?></td>
        <td>
            <a href="baca.php?id=<?= $p["id"]?>" >Lihat</a>
        </td>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>