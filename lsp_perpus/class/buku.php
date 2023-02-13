<?php
include_once("database.php");


class buku {
    private $db;
    public function __construct()
    {
        $this->db = new database;
    }
    public function all(){
        $sql = "SELECT  buku.id, buku.judul, buku.pengarang, penerbit.nama as nama FROM buku, penerbit WHERE buku.id_penerbit = penerbit.id";
    return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id){
        $sql = "SELECT * FROM buku WHERE id = '$id'";
    return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $kode = $data["kode"];
        $nama = $data["nama"];
       

        $sql = "INSERT INTO buku (kode, nama) VALUES ('$kode','$nama')";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAH DATA BUKU";
        }
        return "GAGAL MENAMBAH DATA BUKU";
    }

    public function update($id,$data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "UPDATE buku SET kode = '$kode', nama = '$nama' WHERE id = '$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE DATA BUKU";
        }
        return "GAGAL MENGUPDATE DATA BUKU";
    }
    public function delete($id){
        $sql = "DELETE FROM pesan buku id = '$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGHAPUS DATA BUKU";
        }
        return "GAGAL MENGHAPUS DATA BUKU";
    }

    public function __destruct()
    {

    }
}
?>