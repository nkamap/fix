<?php
include_once("database.php");

class user {
    private $db;
    public function __construct()
    {
        $this->db = new database;
    }
    public function all(){
        $sql = "SELECT * FROM user";
    return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function getanggota(){
        $sql = "SELECT * FROM user WHERE role = 'user'";
    return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function getadministrator(){
        $sql = "SELECT * FROM user WHERE role='admin'";
    return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id){
        $sql = "SELECT * FROM user WHERE id ='$id'";
       return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $user_id = $data["user_id"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];

        $sql = "INSERT INTO user (user_id,fullname,username,password,kelas,alamat) VALUES ('$user_id','$fullname','$username','$password','$kelas','$alamat')";
       
        if($this->db->connect()->query($sql)=== TRUE){
            return "berhasil";
        }
        return "gagal";
    }
    
    public function update ($id, $data){
        // $nis = $data["nis"];
        // $kode = $data["kode"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        // $role = $data["user"];
        $join = "Y-m-d";
        $foto = $data["foto"];

        // var_dump ($foto);

        $targetfile = "../assets/image/" . date("YmdHis") . basename($foto["name"]);
        move_uploaded_file($foto["tmp_name"], $targetfile);

        $sql = "UPDATE user SET fullname = '$fullname',username = '$username',password = '$password',kelas = '$kelas',alamat = '$alamat',join_date = '$join', foto = '$targetfile' WHERE id = '$id' ";

        if($this->db->connect()->query($sql)=== TRUE){
            return "berhasil";
        }
        return "gagal";
    }

}