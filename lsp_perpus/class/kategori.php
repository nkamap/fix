<?php
include_once("database.php");

class kategori {
    public function all(){
        $sql = "SELECT * FROM kategori";

        $db = new database;
        return $db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM kategori WHERE id='$id'";

        $db = new database;
        return $db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "INSERT INTO kategori (kode,nama) VALUES ('$kode','$nama')";

        $db = new database;
        if($db->connect()->query($sql) === TRUE)
        {
            return "BERHASIL MENAMBAH DATA KATEGORI";
        }
        return "GAGAL MENAMBAH DATA KATEGORI";
    }

}
?>