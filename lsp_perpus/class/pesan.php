<?php
include_once("database.php");

class pesan {
    private $db;
    public function __construct()
    {
        $this->db = new database;
    }
    public function all(){
        $sql = "SELECT * FROM pesan";
    return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id){
        $sql = "SELECT * FROM pesan WHERE id = '$id'";
    return $this->db->connect()->query($sql)->fetch_array();
    }
    public function findbyuserid($id){
        $sql = "SELECT * FROM pesan WHERE id_penerima='$id'";
    return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    

    public function create($data){
        $kode = $data["kode"];
        $nama = $data["nama"];
       

        $sql = "INSERT INTO pesan (kode, nama) VALUES ('$kode','$nama')";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAH DATA PESAN";
        }
        return "GAGAL MENAMBAH DATA PESAN";
    }

    public function update($id,$data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "UPDATE pesan SET kode = '$kode', nama = '$nama' WHERE id = '$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE DATA PESAN";
        }
        return "GAGAL MENGUPDATE DATA PESAN";
    }
    public function delete($id){
        $sql = "DELETE FROM pesan WHERE id = '$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGHAPUS DATA PESAN";
        }
        return "GAGAL MENGHAPUS DATA PESAN";
    }

    public function __destruct()
    {

    }
}
?>