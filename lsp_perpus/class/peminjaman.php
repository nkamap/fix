<?php
include_once("database.php");

class peminjaman {
    private $db;
    public function __construct()
    {
        $this->db = new database;
    }

    public function all(){
        $sql = "SELECT user.fullname as peminjam, buku.judul as  buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian,peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.user_id = user.id AND peminjaman.buku_id = buku.id";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getpeminjaman(){
        $sql = "SELECT user.fullname as peminjaman, buku.judul as  buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian,peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is null";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getpengembalian(){
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is NULL";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT buku.id as id_buku, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.id FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id AND tanggal_pengembalian is NULL";
        

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function findKembali($id){
        $sql = "SELECT buku.id as id_buku, buku.judul as buku, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.id FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id AND tanggal_pengembalian IS NOT NULL";
        

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function kembalikan($data){
       $now = date('Y-m-d H:i:s');
       $kondisi_buku_saat_dikembalikan = $data["kondisi_buku_saat_dikembalikan"];

       $sql = "UPDATE peminjaman SET tanggal_pengembalian = '$now', kondisi_buku_saat_dikembalikan = '$kondisi_buku_saat_dikembalikan'";

       if($this->db->connect()->query($sql) === TRUE){
           return "Berhasil Menghapus Data";
       }
       return "Gagal Menghapus Data";
    }


// public function findkembali($id){
//     $sql = "SELECT buku.judul as buku, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = user.id AND tanggal_pengembalian is null";

//     return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
// }

public function create($data){
    $id_user = $data["id_user"];
    $id_buku = $data["id_buku"];
    $tanggal_peminjaman = $data["tanggal_peminjaman"];
    $kondisi_buku_saat_dipinjam = $data["kondisi_buku_saat_dipinjam"];

    $sql = "INSERT INTO peminjaman (id_user, id_buku, tanggal_peminjaman, kondisi_buku_saat_dipinjam) VALUES ('$id_user','$id_buku','$tanggal_peminjaman','$kondisi_buku_saat_dipinjam')";

if($this->db->connect()->query($sql) === TRUE){
    return "BERHASIL MENAMBAH DATA PEMINJAMAN";
}
return "GAGAL MENAMBAH DATA PEMINJAMAN";
}

public function update($id,$data){
    $kode = $data["kode"];
    $nama = $data["nama"];

    $sql = "UPDATE peminjaman SET kode = '$kode', nama = '$nama' WHERE id = '$id'";

    if($this->db->connect()->query($sql) === TRUE){
        return "BERHASIL MENGUPDATE DATA PEMINJAMAN";
    }
    return "GAGAL MENGUPDATE DATA PEMINJAMAN";
    }

public function delete($id){
    
    $sql = "DELETE FROM peminjaman WHERE id = '$id'";

    if($this->db->connect()->query($sql) === TRUE){
        return "BERHASIL MENGHAPUS DATA PEMINJAMAN";
    }
    return "GAGAL MENGHAPUS DATA PEMINJAMAN";
    }

    public function __destruct()
    {

    }
}
?>