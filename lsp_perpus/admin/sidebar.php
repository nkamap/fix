<h1> PERPUS SMKN 64 JAKARTA </h1>

<div class="sidebar">
    <?= $data_user["fullname"]?>
    <ul> 
        <li><a href="/admin/index.php">Dashboard</a></li>
        <li><a href="#">Master Data</a>
        <ul> 
            <li><a href="/admin/master_data/data_anggota/index.php">Data Anggota</a></li>
            <li><a href="/admin/master_data/data_administrator/index.php">Data Administrator</a></li>
            <li><a href="/admin/master_data/data_peminjaman/index.php">Data Peminjaman</a></li>
</ul>
</li>
<li><a href="#">Katalog Buku</a>
<ul> 
            <li><a href="/admin/katalog_buku/data_buku/index.php">Data Buku</a></li>
            <li><a href="/admin/katalog_buku/data_kategori/index.php">Data Kategori</a></li>
            <li><a href="/admin/katalog_buku/data_penerbit/index.php">Data Penerbit</a></li>
</ul>
</li>
<li><a href="/admin/laporan_perpustakaan/index.php">Laporan Perpustakaan</a></li>
<li><a href="/admin/identitas.php">Identitas Aplikasi</a></li>
<li><a href="/admin/pesan.php">Pesan</a></li>
<li><a href="">Keluar</a></li>
</ul>
</div>