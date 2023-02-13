<?php
include_once("database.php");

class pemberitahuan {
    private $db;
    public function __construct()
    {
        $this->db = new database;
    }
    public function all(){
        $sql = "SELECT * FROM pemberitahuan WHERE status='aktif'";
    return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id){
        $sql = "SELECT * FROM pemberitahuan WHERE id = '$id'";
    return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $isi = $data["isi"];
        $status = $data["status"];
       

        $sql = "INSERT INTO pemberitahuan (isi, status) VALUES ('$isi','$status')";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAH DATA PEMBERITAHUAN";
        }
        return "GAGAL MENAMBAH DATA PEMBERITAHUAN";
    }

    public function update($id,$data){
        $isi = $data["isi"];
        $status = $data["status"];

        $sql = "UPDATE pemberitahuan SET isi = '$isi', status = '$status' WHERE id = '$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE DATA PEMBERITAHUAN";
        }
        return "GAGAL MENGUPDATE DATA PEMBERITAHUAN";
    }
    public function delete($id){
        $sql = "DELETE FROM pemberitahuan WHERE id = '$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGHAPUS DATA PEMBERITAHUAN";
        }
        return "GAGAL MENGHAPUS DATA PEMBERITAHUAN";
    }
}
?>