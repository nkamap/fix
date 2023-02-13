<?php
include_once('../class/peminjaman.php');

$peminjaman = new peminjaman;
$data_peminjaman = $peminjaman->findKembali(2);

?> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Buku</title>
</head>
<body>
    <?php include('../sidebar.php') ?>

    <div class="peminjaman">
        <h3>Buku Yang Sudah Dikembalikan</h3>

        <table>
            <tr>
                <th>No.</th>
                <th>Buku</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi Buku Saat Dikembalikan</th>
</tr>
<?php
foreach($data_peminjaman as $key => $p) {
    ?>

    <tr>
        <td><?=$key+1?></td>
        <td><?= $p["buku"]?></td>
        <td><?= $p["tanggal_pengembalian"]?></td>
        <td><?= $p["kondisi_buku_saat_dikembalikan"]?></td>
</tr>
<?php
    }
    ?>
    </table>
</div>
</body>
</html>